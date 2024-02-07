/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{html,js,php}", "./styles/*.css", "./**/*.php"],
  theme: {
    extend: {
			fontFamily: {
				tactic: [ '"TacticSans"', 'sans-serif' ]
			},
			width: {
				"9/10": "90%"
			},
			screens: {
				"xs": "480px",
				"xl": "1200px",
				"2xl": "1440px",
				"3xl": "1600px"
			},
			listStyleType: {
				alpha: "lower-alpha",
				circle: "circle"
			},
			spacing: {
				"limit": "1536px",
				"container": "1088px",
				"h2": "664px"
			},
			colors: {
				red: {
					925: "hsla(0, 73%, 24%, <alpha-value>)" // #6A1010
				},
				lavender: {
					100: "hsla(240, 63%, 95%, <alpha-value>)",
					300: "hsla(241, 60%, 83%, <alpha-value>)",
					400: "hsl(245, 60%, 79%, <alpha-value>)",
					500: "hsla(241, 54%, 52%, <alpha-value>)",
					700: "hsla(241, 19%, 22%, <alpha-value>)",
					800: "hsla(241, 28%, 16%, <alpha-value>)",
				},
				gray: {
					50: "hsla(210, 40%, 98%, <alpha-value>)",
					150: "hsla(210, 40%, 96%, <alpha-value>)",
					175: "hsla(210, 40%, 94%, <alpha-value>)",
					200: "hsla(215, 27%, 91%, <alpha-value>)",
					350: "hsla(240, 5%, 61%, <alpha-value>)",
					925: "hsla(0, 0%, 11.8%, <alpha-value>)" // #1E1E1E
				},
				zinc: {
					300: "hsla(215, 20%, 65%, <alpha-value>)",
					350: "hsla(217, 18%, 65%, <alpha-value>)"
				},
				indigo: {
					25: "hsla(210, 40%, 98%, <alpha-value>)",
					150: "hsla(228, 88%, 92%, <alpha-value>)",
					1000: "hsla(235, 45%, 15%, <alpha-value>)"
				},
				neutral: {
					750: "hsl(0, 0%, 17%, <alpha-value>)", // #2C2C2C
				},
				azure: {
					200: "hsla(187, 93%, 88%, <alpha-value>)", //	#C4F6FD
					250: "hsl(187, 79%, 62%, <alpha-value>)", // #51D8EB
					300: "hsla(187, 35%, 58%, <alpha-value>)", //	#70B1BA
					400: "hsla(187, 57%, 48%, <alpha-value>)", // #35AFC0
					800: "hsl(188, 66%, 20%, <alpha-value>)" // #114B54
				}
			},
		}
  }
}

