/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./pages/*.php", "./pages/modules/*.php"],
  theme: {
    extend: {
      colors: {
        'primary': '#0F1B23',
        'background': '#2f3940',
        'accent': '#32936F',
        'light': '#26A96C',
        'tekst': '#f8f8ff',   
      },
      boxShadow: {
        'shadBef': '-10px 0px 25px 0px rgba(50,147,111,0.25)',
        'shadBefWhite': '-10px 0px 25px 0px rgba(248,248,255,0.15)',
        'shadAft': '-10px 0px 25px 0px rgba(38,169,108,0.4)'
      }
    },
  },
  plugins: [],
}

