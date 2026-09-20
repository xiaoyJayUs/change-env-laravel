<?php

namespace XiaoyJayUs\ChangeEnv\Laravel\Console;


use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\Question;

class ChangeEnv extends Command
{

    /**
     * {@inheritdoc}
     */
    protected $name = 'xy:change-env';

    /**
     * {@inheritdoc}
     */
    protected $description = '开发环境切换';

    /** @var array $config */
    protected $config = [];


    /**
     * {@inheritdoc}
     */
    protected function getArguments(): array
    {
        return [
            ['env-all', InputArgument::OPTIONAL, '替换所有配置环境'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getOptions(): array
    {
        $options     = [
            ['quick', 'Q', InputOption::VALUE_NONE, '快捷模式'],
        ];
        $configNames = array_keys($this->config());
        foreach ($configNames as $name) {
            $options[] = [$name, null, InputOption::VALUE_OPTIONAL, 'local/dev/prod', 'local'];
        }
        return $options;
    }

    public function handle(): bool
    {
        $this->config = $this->config();
        $configNames  = array_keys($this->config);
        $argument     = $this->input->getArgument('env-all');
        $options      = $this->input->getOptions();
        # 快捷模式
        if ($options['quick']) {
            $askConfigNames = $this->askQuestion((new ChoiceQuestion('需要替换的【配置】', $configNames))->setMultiselect(true));
            $askEnv         = $this->askQuestion((new ChoiceQuestion('需要替换的【环境】', ['local', 'dev', 'prod'])));
            foreach ($askConfigNames as $name) {
                $options[$name] = $askEnv;
            }
        }
        # 获取配置文件
        $file    = $this->laravel->basePath() . '/.env';
        $content = file_get_contents($file);
        $content = preg_replace("/\r/", PHP_EOL, $content);

        # 替换配置
        $msg = [];
        foreach ($configNames as $name) {
            $inputEnv  = $argument ?: $options[$name];
            $nowConfig = $this->config[$name][$inputEnv];
            # 替换某个配置
            foreach ($nowConfig as $key => $value) {
                $pattern     = '/^' . preg_quote($key, '/') . '=.*$/m';
                $replacement = $key . '=' . $value;
                $content     = preg_replace($pattern, $replacement, $content);
            }
            $msg[] = "{$name}:{$inputEnv}";
        }

        #替换源文件
        file_put_contents($file, $content);

        $this->info(implode(PHP_EOL, $msg));
        return true;
    }

    /**
     * 获取配置
     * @return array
     */
    public function config(): array
    {
        return config('change-env');
    }

    /**
     * 输出提问
     * @param Question $question
     * @return mixed
     */
    public function askQuestion(Question $question)
    {
        return $this->output->askQuestion($question);
    }
}