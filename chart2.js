
function changeLanguage() {
  const textElement = document.getElementById('text1');
  const navop = document.getElementById('navop');
  const s_in = document.getElementById('s_in');
  const s_ot = document.getElementById('s_ot');
  const a_us = document.getElementById('a_us');
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
  const selectedLanguage = document.getElementById('languageSelect').value;

  if (selectedLanguage === 'si') {
      textElement.innerText = 'භාශාව තෝරන්න';
      navop.innerText = 'විකල්ප';
      s_in.innerText = 'පුරන්න';
      s_ot.innerText = 'වරන්න';
      a_us.innerText = 'අප ගැන';
      cantitle.innerText = 'කළමණාකරණ අංශය';
      dashtitle.innerText = 'කළමණාකරණය';
      chartname1.innerText = 'වර්ගය අනුව සත්ව ජනගහනය බෙදා හැරීම';
      chartname2.innerText = 'සත්ව සෞඛ්‍ය තත්වය දළ විශ්ලේෂණය';
      can1.innerText = 'පශු සම්පත් දත්ත';
      can2.innerText = 'ආහාර සංචිත';
      can3.innerText = 'නිශ්පාදනය';
      can4.innerText = 'සෞඛ්ය නිරීක්ෂණ';
      can5.innerText = 'සේවක කළමනාකරණය';
      can6.innerText = 'පශු සම්පත් දත්ත වාර් තා';
      can7.innerText = 'ආහාර කාලසටහන කළමණාකරණය';
      can8.innerText = 'දැනුම්දීම';
      nav1.innerText = 'Leza ගොවිපල';
      card1.innerText = 'මුළු සතුන් ගණන';
      card2.innerText = 'අවධානය දියයුතු';
      card3.innerText = 'ගැබිනි සතුන්';
      card4.innerText = 'සෞඛ්‍ය සම්පන්න';
      
  } else {
      textElement.innerText = 'Select Language';
      navop.innerText = 'My Options';
      s_in.innerText = 'Sign In';
      s_ot.innerText = 'Sign Out';
      a_us.innerText = 'about us';
      cantitle.innerText = 'Dashboard';
      dashtitle.innerText = 'Dashboard';
      chartname1.innerText = 'Distribution of Animal Population by Type';
      chartname2.innerText = 'Animal Health Status Overview';
      can1.innerText = 'LiveStock details';
      can2.innerText = 'Food Stock';
      can3.innerText = 'Production';
      can4.innerText = 'Health Monitoring';
      can5.innerText = 'Employee Management';
      can6.innerText = 'Report related live stock';
      can7.innerText = 'Manage feeding schedules';
      can8.innerText = 'Notification and Alerts';
      nav1.innerText = 'Lezafarming';
      card1.innerText = 'Total Number of Animals';
      card2.innerText = 'Needs Attention';
      card3.innerText = 'Pregnant';
      card4.innerText = 'Healthy';
  }
}