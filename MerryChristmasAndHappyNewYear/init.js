$(document).ready(function(){
   $('.footerbtn').attr('href','whatsapp://send?text=Bhool Jao Bite Hua Kal, Dil Me Bsa Lo Ane Wale Pal. Khushiyan Lekar Aayega Ane Wala kal. Naye Saal Ki Dhero Shubhkamnaye Ke Sath.! â˜…â˜…â™¡Touch this Blue Line  Enter Your Name and See Magicâ™¡ â˜…â˜…ðŸ‘‰http://wishingyear.co/?name='+a);

 $('.footerbtn1').attr('href','  https://www.facebook.com/sharer/sharer.php?u=http://wishingyear.co/?name='+a);
 
 
 let searchParams = new URLSearchParams(window.location.search)

let param = searchParams.get('name');

$('#printName').text(param);

});
