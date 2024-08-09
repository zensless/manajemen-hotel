/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["**/*.{html,js,php}", "**/admin/**.{html,js,php}"],
  theme: {
    extend: {
      colors: {
        white: "#fff",
        whitesmoke: "#eee",
        black: "#000",
        lime: "#42ff00",
        red: "#ff0000",
        gray: {
          100: "rgba(0, 0, 0, 0.47)",
          200: "rgba(0, 0, 0, 0.4)",
          300: "rgba(0, 0, 0, 0.44)",
        },
        darkslategray: "#262d33",
        slategray: "#6e7781",
        gold: "#ffe601",
        orangered: "#ff6b00",
        firebrick: "#b81111",
      },
      spacing: {},
      fontFamily: {
        roboto: "Roboto",
        inter: "Inter",
        poppins: "Poppins",
      },
      borderRadius: {
        xl: "20px",
      },
    },
    fontSize: {
      lg: "18px",
      "6xl": "25px",
      xl: "20px",
      sm: "14px",
      xs: "12px",
      mini: "15px",
      inherit: "inherit",
    },
    screens: {
      lg: {
        max: "1200px",
      },
      mq1050: {
        raw: "screen and (max-width: 1050px)",
      },
      mq750: {
        raw: "screen and (max-width: 750px)",
      },
      mq450: {
        raw: "screen and (max-width: 450px)",
      },
    },
  },
  corePlugins: {
    preflight: false,
  },
  plugins: [],
};
