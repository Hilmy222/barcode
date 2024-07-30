/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      screens:{
        // 'ml' : '425px',
        // 'mm' : '375px',
        'xs' : '320px',
      }

    },
  },
  plugins: [],
}