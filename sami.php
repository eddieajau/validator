<?php

return new Sami\Sami(__DIR__.'/src', array(
    'theme'                => 'enhanced',
    'title'                => 'Validator API',
    'build_dir'            => __DIR__.'/api',
    'cache_dir'            => __DIR__.'/build/cache',
    'default_opened_level' => 2,
));