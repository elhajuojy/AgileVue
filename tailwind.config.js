/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [


    "./resources/views/**/*.blade.php",
    "./resources/js/**/*.vue",
    "./resources/js/**/*.js",
    "./resources/js/**/*.jsx",
    "./resources/js/**/*.ts",
    "./resources/js/**/*.tsx",
  ],
  theme: {
    extend: {
        colors: {
            'primary': '#1E90FF',
            'secondary': '#FF6347',
            'danger': '#DC143C',
        },
        fontFamily: {
            'sans': ['Nunito', 'sans-serif'],
        },
    },
  },
  plugins: [
  ],
}
