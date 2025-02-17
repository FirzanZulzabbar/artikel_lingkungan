/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.html",
    "./src/**/*.{js,ts,jsx,tsx}",
    "**/*.html",
    "**/*.php",
  ],
  theme: {
    extend: {
      fontFamily: {
        inter: ["Inter", "sans-serif"],
        sf: ["SF UI Display", "sans-serif"],
      },
    },
  },
  plugins: [],
};
