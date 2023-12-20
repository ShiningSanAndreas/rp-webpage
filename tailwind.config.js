/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./update/*.php"],
  theme: {
    extend: {
      colors: {
        primary: '#352F44',
        background: '#5C5470',
        accent: '#B9B4C7',
        contrast: '#FAF0E6'
      },
    },
  },
  plugins: [],
}

