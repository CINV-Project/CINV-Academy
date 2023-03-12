import * as esbuild from 'esbuild'
import alias from 'esbuild-plugin-alias'
import { createRequire } from 'module';
const require = createRequire(import.meta.url);

const config = {
  entryPoints: ['src/index.jsx'],
  bundle: true,
  minify: true,
  sourcemap: true,
  jsxFactory: 'h',
  jsxFragment: 'Fragment',
  outfile: '../../static/js/frontend_build.js',
  plugins: [
    alias({
      'react': require.resolve('preact/compat'),
      'react-dom': require.resolve('preact/compat'),
    }),
  ],
};

const { argv } = process;
const devMode = argv.length > 2 && argv[2] == '--dev';
const handler = devMode ? esbuild.context : esbuild.build;
const ctx = await handler(config).catch((e) => {
  console.error(e);
  process.exit(1);
});
if (devMode) {
  await ctx.watch()
  let { host, port } = await ctx.serve({ servedir: '../../', port: 8001 })
  console.info(`Serving on http://localhost:${port}`)
}

console.log("⚡ Done")
