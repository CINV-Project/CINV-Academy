/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.{html,jsx,php}"],
  prefix: 'tw-',
  theme: {
    extend: {
      colors: {
        'accent-blue': '#5bc0de',
      },
    },
  },
  plugins: [],
}
