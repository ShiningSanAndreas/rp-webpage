/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./pages/*.php", "./pages/modules/*.php"],
  theme: {
    extend: {
      colors: {
        'primary': '#222831',
        'background': '#393E46',
        'alter': '#929BA8',
        'accent': '#3C4252',
        'light': '#B6CEE9',   
      },
    },
  },
  plugins: [],
}

