/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: "class",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
                roboto: ["Roboto", "sans-serif"],
                pantom: ["Pantom", "sans-serif"],
            },
            colors: {
                "abu-pale": "#ffffff66",
                "abu-gelap": "#615f5f7a",
                positif: "#00FF29",
                negatif: "#D20000",
                "biru-gelap": "#0400D0",
                "background-gelap": "#151719",
                "background-input": "#E9DADA4D",
                "border-input": "#7B7B7B",
            },
        },
    },
    variants: {
        fill: ["hover", "focus"],
    },
    plugins: [require("flowbite/plugin")],
};
