/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./pages/*.php"],
  theme: {
    extend: {
      colors: {
        'primary': '#222831',
        'background': '#393E46',
        'accent': '#3C4252',
        'contrast': '#B6CEE9',   
      },
    },
  },
  plugins: [],
}

