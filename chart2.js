
function changeLanguage() {
  const textElement = document.getElementById('text1');
  const navop = document.getElementById('navop');
  const s_in = document.getElementById('s_in');
  const s_ot = document.getElementById('s_ot');
  const cantitle = document.getElementById('cantitle');
  const dashtitle = document.getElementById('dashtitle');
  const chartname1 = document.getElementById('chartname1');
  const chartname2 = document.getElementById('chartname2');
  const can1 = document.getElementById('can1');
  const can2 = document.getElementById('can2');
  const can3 = document.getElementById('can3');
  const can4 = document.getElementById('can4');
  const can5 = document.getElementById('can5');
  const can6 = document.getElementById('can6');
  const can7 = document.getElementById('can7');
  const can8 = document.getElementById('can8');
  const nav1 = document.getElementById('nav1');
  const card1 = document.getElementById('card1');
  const card2 = document.getElementById('card2');
  const card3 = document.getElementById('card3');
  const card4 = document.getElementById('card4');
  const ftrnote = document.getElementById('ftrnote');
  const selectedLanguage = document.getElementById('languageSelect').value;

  if (selectedLanguage === 'si') {
      textElement.innerText = 'භාශාව තෝරන්න';
      navop.innerText = 'විකල්ප';
      s_in.innerText = 'පුරන්න';
      s_ot.innerText = 'වරන්න';
      cantitle.innerText = 'කළමණාකරණ අංශය';
      dashtitle.innerText = 'කළමණාකරණය';
      chartname1.innerText = 'වර්ගය අනුව සත්ව ජනගහනය බෙදා හැරීම';
      chartname2.innerText = 'සත්ව සෞඛ්‍ය තත්වය දළ විශ්ලේෂණය';
      can1.innerText = 'පශු සම්පත් දත්ත';
      can2.innerText = 'ආහාර සංචිත';
      can3.innerText = 'නිශ්පාදනය';
      can4.innerText = 'විකිණුම් අංශය';
      can5.innerText = 'සේවක කළමනාකරණය';
      can6.innerText = 'සෞඛ්ය නිරීක්ෂණ';
      can7.innerText = 'ආහාර කාලසටහන කළමණාකරණය';
      can8.innerText = 'දැනුම්දීම';
      nav1.innerText = 'Leza ගොවිපල';
      card1.innerText = 'මුළු සතුන් ගණන';
      card2.innerText = 'අවධානය දියයුතු';
      card3.innerText = 'ගැබිනි සතුන්';
      card4.innerText = 'සෞඛ්‍ය සම්පන්න';
      ftrnote.innerText = 'LezaFarming යනු සාම්ප්‍රදායික ගොවිපල කළමනාකරණ ක්‍රමවල ඇති හිඩැස් ආමන්ත්‍රණය කරමින් ශ්‍රී ලංකාවේ කුඩා හා මධ්‍ය පරිමාණ ගොවිපල සඳහා සකස් කරන ලද නව්‍ය පශු සම්පත් කළමනාකරණ පද්ධතියකි. එය සෞඛ්‍ය අධීක්ෂණය, එන්නත් සහ ප්‍රතිකාර සඳහා ස්වයංක්‍රීය ඇඟවීම්, අභිජනන වාර්තා, සහ ආහාර කළමනාකරණය වැනි විශේෂාංග ලබා දීමෙන් එදිනෙදා ගොවිපල මෙහෙයුම් සරල කරයි. LezaFarming නිර්මාණය කර ඇත්තේ පරිශීලක ප්‍රවේශ්‍යතාව මනසේ තබාගෙන, සියළුම ගොවීන් සඳහා ඔවුන්ගේ තාක්ෂණික විශේෂඥතාව නොසලකා භාවිතයේ පහසුව සහතික කරමිනි. ප්‍රධාන ක්‍රියාවලීන් ස්වයංක්‍රීය කිරීම මගින්, එය ගොවීන්ට කාර්යක්ෂමතාව ඉහළ නැංවීමට, දෝෂ අවම කිරීමට සහ සමස්ත පශු සම්පත් ඵලදායිතාව වැඩිදියුණු කිරීමට, ශ්‍රී ලංකාවේ නවීන, තිරසාර ගොවිතැන් පිළිවෙත් සඳහා දායක වේ.';
      
  } else {
      textElement.innerText = 'Select Language';
      navop.innerText = 'My Options';
      s_in.innerText = 'Sign In';
      s_ot.innerText = 'Sign Out';
      cantitle.innerText = 'Dashboard';
      dashtitle.innerText = 'Dashboard';
      chartname1.innerText = 'Distribution of Animal Population by Type';
      chartname2.innerText = 'Animal Health Status Overview';
      can1.innerText = 'LiveStock details';
      can2.innerText = 'Food Stock';
      can3.innerText = 'Production';
      can4.innerText = 'Customer & Selling';
      can5.innerText = 'Employee Management';
      can6.innerText = 'Animal Health Monitoring';
      can7.innerText = 'Manage feeding schedules';
      can8.innerText = 'Notification and Alerts';
      nav1.innerText = 'Lezafarming';
      card1.innerText = 'Total Number of Animals';
      card2.innerText = 'Needs Attention';
      card3.innerText = 'Pregnant';
      card4.innerText = 'Healthy';
      ftrnote.innerText = 'LezaFarming is an innovative Livestock Management System tailored for small to medium-scale farms in Sri Lanka, addressing gaps in traditional farm management methods. It simplifies day-to-day farm operations by offering features like health monitoring, automated alerts for vaccinations and treatments, breeding records, and feeding management. LezaFarming is designed with user accessibility in mind, ensuring ease of use for all farmers, regardless of their technical expertise. By automating key processes, it helps farmers boost efficiency, reduce errors, and improve overall livestock productivity, contributing to modern, sustainable farming practices in Sri Lanka.';
  }
}