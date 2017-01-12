<?php

if (!function_exists('webpack')) {

    /**
     * Get the path to a versioned Webpack file.
     *
     * @param  string $extension Asset extension
     * @param  string $bundle Default bundle
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    function webpack($extension, $bundle = 'app')
    {
        static $manifest = null;

        if (is_null($manifest)) {

            $content = @file_get_contents(
                public_path(
                    config('webpack.build_path', 'build') . '/manifest.json'
                )
            );

            $manifest = @json_decode($content, true);
        }

        if (isset($manifest[$bundle][$extension])) {

            if (App::isLocal() && !File::exists(public_path($manifest[$bundle][$extension]))) {

                $url = '';

                if (!preg_match('~^(http\:\/\/|https\:\/\/)~i', $manifest[$bundle][$extension])) {
                    $secure = config('webpack.dev_server.https', false);
                    $server = config('webpack.dev_server.ip', '127.0.0.1');
                    $port = config('webpack.dev_server.port', 8080);

                    $url = 'http' . ($secure ? 's://' : '://') . $server . ':' . $port;
                }

                return $url . $manifest[$bundle][$extension];
            }

            return $manifest[$bundle][$extension];
        }

        throw new InvalidArgumentException("File {$bundle}.{$extension} not defined in asset manifest.");
    }
}
