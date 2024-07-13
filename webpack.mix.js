const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .css('resources/css/app.css', 'public/css')
   .options({
       postCss: [require('autoprefixer')],
   })
   .webpackConfig({
       module: {
           rules: [
               {
                   test: /\.(png|jpe?g|gif|svg)$/i,
                   use: [
                       {
                           loader: 'file-loader',
                           options: {
                               name: '[path][name].[ext]',
                           },
                       },
                       {
                           loader: 'image-webpack-loader',
                           options: {
                               bypassOnDebug: true,
                               disable: true,
                           },
                       },
                   ],
               },
           ],
       },
   });

if (mix.inProduction()) {
    mix.version();
}

mix.sourceMaps();
