function validateWord(word) {
			word = word.toLowerCase();
			if (word.length < 3) {
				return false;
			}
            if (!(/^[0-9a-zA-Z]+$/.test(word))) {
                return false;
            }
			
			//exclude commonly used words
			
			var common = ["the", "be", "to", "of", "and", "a", "in", "not", 
				"that", "it", "for", "on", "as", "do", "at", "this", 
				"but", "by", "from", "or", "an", "so", "if", "into", 
				"its", "it's", "about", "there", "their", "i'm", "i'll", 
				"you", "you're", "are", "am", "i", "my", "your", "that's", 
				"is", "than", "then", "what", "when", "was", "did", 
				"too", "there's", "hey", "ooh", "who", "been", "i've", 
				"you'll", "we'll", "she'll", "he'll", "she's", "he's", 
				"you've", "have", "with", "that's", "yeah", "ooh", "aah", 
				"we're", "she", "he", "they", "we", "gonna", "wanna", 
				"just", "hah", "i'd", "you'd", "our", "your", "because", 
				"cuz", "has", "br", "quot", "amp"];		

			if(common.indexOf(word) > -1) {
				return false;
			}


			return word;
		}