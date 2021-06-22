

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        <?php 
        include "css/style.css"
        ?>
*{
margin: 0;
padding: 0;
font-family: "Open Sans",sans-serif;
box-sizing: border-box;
}
.services-banner{
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url(assets/images/laptop.jpg) center/cover no-repeat fixed;
   
    
}
body
{
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url(assets/images/laptop.jpg) center/cover no-repeat fixed;
}
.services
{
    width:100%;height:auto;
    margin:100px 0;
    text-align: center;
    
         
}

  .services__img{
    width: 100px;
    height: 100px;
    fill: var(--first-color);
    margin-left:auto;
    margin-right:auto;
  }

  .services h2
{
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 3px;
    opacity: 0.9;
    font-size: 0.9rem;
    margin:20px 0 15px 0;
    font-weight:bold;
    line-height:1.1;
    word-spacing:4px;
    font-family:"Poppins",sans-serif;
}
.services p
{
    text-align:center;
    letter-spacing: 1px;
    opacity: 0.9;
    font-size: 0.7rem;
    font-weight:medium;
    line-height:1.9;
    word-spacing:3px;
    font-family:"Poppins",sans-serif;
}
.service-divs
{
background:rgb(252, 248, 248);
border:medium none;
padding:35px !important;
border-radius:3px;
transition:0.3s ;
text-align:center;
margin:2px 0;
}
.services-container{
    width:100%;
    max-width:1000px;
    margin:0 auto;
    padding:20px;
    box-shadow:0 0 20px 0 rgba(0,0,0,0.3);
    position:relative;
    background:rgb(252, 248, 248);
    

   
}
.banner-items{
    text-align: center;
    display: grid;
    place-items: center;
    color: #fff;
    height:400px;
}
.banner-items h1{
    font-size: 2.5rem;
    font-family: 'Kaushan Script', cursive;
}
.banner-items .text{
    text-transform: uppercase;
    letter-spacing: 3px;
    opacity: 0.9;
}
.banner-items button{
    text-transform: uppercase;
    background: transparent;
    color: #fff;
    letter-spacing: 2px;
    border: 3px solid #fff;
    padding: 0.85rem 1.85rem;
    margin-top: 1.75rem;
}
.banner-items button:hover{
    background: #fff;
    color: #000;
}

</style>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
</head>
<body> 
    <?php include "outerpageheader.php"?>
<section>
        <div class="services-banner">
          <div class = "container">
          <div class="banner-items">
            <h1>Our Services</h1>
            <p class = "text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam, quam, amet cupiditate exercitationem illo, eius cum nemo iste esse fuga veritatis ipsam? Neque ea maiores eveniet aliquam veritatis necessitatibus fugiat.</p>
            <button type = "button" onclick="find_expert()">Get Started</button>
          </div>
        </div>
        </div>
</section> 
<section class="services">
    <div class="services-container container">
    <span style="font-family:'Kaushan Script', cursive;letter-spacing:4px;color:#361f19;font-size:1.5rem;margin:3px;">What We Offer</span>
        <div class="row">
            <div class="service-divs col-lg-4 col-md-4 col-12">
               <div class="img-container"> 
                <svg class="services__img" id="e3b35851-94e9-429d-821b-b07e6585d4d1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="641.9999" height="608.42057" viewBox="0 0 641.9999 608.42057"><path d="M511.00005,261.78971a115.853,115.853,0,0,1-49.68994,95.19,114.44983,114.44983,0,0,1-13.55029,8.15c-1.55957.8-3.12989,1.56-4.7295,2.28-1.44043.66-2.89013,1.28-4.36035,1.87a116.42052,116.42052,0,0,1-57.56982,7.68q-5.06984-.6-10.01026-1.65c-.13964-.03-.29-.06-.42968-.09a113.3187,113.3187,0,0,1-20.15039-6.27,116.01241,116.01241,0,1,1,160.49023-107.16Z" transform="translate(-279.00005 -145.78971)" fill="#f1f1f1"/><path d="M416.35991,240.13969c-.10009-.12-.21-.23-.31982-.34a33.4444,33.4444,0,0,0-47.04-.48c-.06982.06-.12988.12-.18994.18-.08008.07-.1499.13995-.22022.21a33.42692,33.42692,0,0,0-9.81982,23.68v21a4.50677,4.50677,0,0,0,4.5,4.5h58a4.50677,4.50677,0,0,0,4.5-4.5v-21A33.34842,33.34842,0,0,0,416.35991,240.13969Z" transform="translate(-279.00005 -145.78971)" fill="#2f2e41"/><circle cx="114.61417" cy="118.33089" r="24.56103" fill="#ffb7b7"/><path d="M419.43023,262.0297l-2.89991-20.26a2.537,2.537,0,0,0-.89013-1.59,2.62681,2.62681,0,0,0-.53028-.33c-14.85009-6.95-29.90966-6.95-44.75976-.02a2.4484,2.4484,0,0,0-.5503.35c-.05957.05-.11962.11-.17968.17a2.53154,2.53154,0,0,0-.7002,1.51l-1.93994,20.29a2.50543,2.50543,0,0,0,.64014,1.92,2.47719,2.47719,0,0,0,1.43994.78,1.83844,1.83844,0,0,0,.41015.04h4.91993a2.52263,2.52263,0,0,0,2.27-1.44l2.12988-4.56a1.49369,1.49369,0,0,1,2.83984.45l.41992,3.36a2.51167,2.51167,0,0,0,2.48047,2.19H416.96a2.40424,2.40424,0,0,0,1.21-.31995,2.53246,2.53246,0,0,0,.68018-.54A2.50641,2.50641,0,0,0,419.43023,262.0297Z" transform="translate(-279.00005 -145.78971)" fill="#2f2e41"/><path d="M454.35015,333.67973l6.96,23.3a114.44983,114.44983,0,0,1-13.55029,8.15c-1.55957.8-3.12989,1.56-4.7295,2.28l-7.21045-30.91-2.7998-11.99006,18-2Z" transform="translate(-279.00005 -145.78971)" fill="#ffb7b7"/><path d="M371.52007,329.80973l-.6001,31.48-.25976,13.93a113.3187,113.3187,0,0,1-20.15039-6.27L352.9,339.12974l.6001-7.52Z" transform="translate(-279.00005 -145.78971)" fill="#ffb7b7"/><path d="M454.35015,333.67973l-18.08008,2.71.22021,2.97,2.17969,29.92a116.42052,116.42052,0,0,1-57.56982,7.68q-5.06984-.6-10.01026-1.65c1.48-6.22,2.76026-11.82,1.18018-12.92a11.97931,11.97931,0,0,1-1.3501-1.1c-7.37012-7.03-4.6499-22.9-4.6499-22.9L352.9,339.12974l-4.62988.25995s2-32,11-32h11l53-5s15-5,19,2c2.1001,3.67,5.83984,11.45,8.93018,18.03,2.7998,5.98,5.06982,10.97,5.06982,10.97Z" transform="translate(-279.00005 -145.78971)" fill="#2f2e41"/><path d="M920.99316,263.06744a115.8475,115.8475,0,0,1-48.88325,93.35228c-.25976.18-.52978.37-.7998.56-.27979.2-.56983.4-.85986.59q-2.52027,1.74-5.14014,3.33-3.68994,2.25-7.55029,4.23c-.07959.04-.16993.08-.25.12q-2.21925,1.13991-4.4795,2.16c-.05029.02-.09033.04-.14013.06-.3501.16-.72022.33-1.08008.48-2.79,1.24-5.64014,2.37005-8.54,3.37005q-3.70533,1.305-7.52,2.34a113.72947,113.72947,0,0,1-15.8501,3.18,115.58789,115.58789,0,0,1-13.75976.94c-.38037.01-.76026.01-1.14014.01-2.50977,0-5.00977-.08-7.48-.24-2.16016-.14-4.29981-.33-6.41992-.59-3.27-.39-6.5-.91-9.68018-1.59-.13965-.02-.27978-.05-.41992-.08-.10986-.02-.23-.05-.33984-.07-3.2002-.67-6.3501-1.49-9.43995-2.43q-4.36523-1.32-8.57031-2.98c-.71972-.28-1.42969-.56-2.14013-.86-1.76954-.74-3.51954-1.51-5.23975-2.34-.5-.23-.98975-.47-1.48-.71-1.66016-.81-3.29981-1.66-4.8999-2.56q-2.89527-1.605-5.68994-3.37c-2.3501-1.48-4.6504-3.04-6.88038-4.69a116.0049,116.0049,0,0,1,70.32986-209.47852C870.25764,146.6848,921.67946,199.45709,920.99316,263.06744Z" transform="translate(-279.00005 -145.78971)" fill="#f1f1f1"/><path d="M780.66021,375.21971c-3.2002-.67-6.3501-1.49-9.43995-2.43l10.60987-65.79,10.98974-.34,19.93018-.63,10.22021-.32s7.25,31.86,12.77979,67.95a113.72947,113.72947,0,0,1-15.8501,3.18,115.58789,115.58789,0,0,1-13.75976.94c-.38037.01-.76026.01-1.14014.01-2.50977,0-5.00977-.08-7.48-.24-2.16016-.14-4.29981-.33-6.41992-.59-3.27-.39-6.5-.91-9.68018-1.59-.13965-.02-.27978-.05-.41992-.08C780.89019,375.26969,780.77007,375.23973,780.66021,375.21971Z" transform="translate(-279.00005 -145.78971)" fill="#cbcbcb"/><path d="M781.42,375.36973c-.13965-.02-.27978-.05-.41992-.08-.10986-.02-.23-.05-.33984-.07-3.2002-.67-6.3501-1.49-9.43995-2.43q-4.36523-1.32-8.57031-2.98c-.71972-.28-1.42969-.56-2.14013-.86-1.76954-.74-3.51954-1.51-5.23975-2.34-.5-.23-.98975-.47-1.48-.71l-.87988-49.26,27-11.56995s.08984.72,12.90966,1.59C795.25982,314.61973,781.42,375.36973,781.42,375.36973Z" transform="translate(-279.00005 -145.78971)" fill="#2f2e41"/><path d="M862.12017,314.30973l-5.08985,26.75.4795,24.19q-2.21925,1.13991-4.4795,2.16c-.05029.02-.09033.04-.14013.06-.3501.16-.72022.33-1.08008.48-2.79,1.24-5.64014,2.37005-8.54,3.37005q-3.70533,1.305-7.52,2.34a113.72947,113.72947,0,0,1-15.8501,3.18,115.58789,115.58789,0,0,1-13.75976.94l-.53028-42.87c-1.11963-13.82,2.59034-22.96,7.14014-28.88,24.25-3.24,23.71-3.53,23.71-3.53l25.71,11.57Z" transform="translate(-279.00005 -145.78971)" fill="#2f2e41"/><path d="M764.48,320.49974l-1.83008,49.31c-.71972-.28-1.42969-.56-2.14013-.86-1.76954-.74-3.51954-1.51-5.23975-2.34-.5-.23-.98975-.47-1.48-.71-1.66016-.81-3.29981-1.66-4.8999-2.56q-2.89527-1.605-5.68994-3.37l9.71-43.33Z" transform="translate(-279.00005 -145.78971)" fill="#2f2e41"/><path d="M872.10991,356.41972c-.25976.18-.52978.37-.7998.56-.27979.2-.56983.4-.85986.59q-2.52027,1.74-5.14014,3.33-3.68994,2.25-7.55029,4.23c-.07959.04-.16993.08-.25.12q-2.28651,1.17447-4.61685,2.22169l-.00278-.00173-1.83008-49.48,11.06006-3.68.50976-.17Z" transform="translate(-279.00005 -145.78971)" fill="#2f2e41"/><ellipse cx="805.22375" cy="260.4931" rx="28.60264" ry="28.52916" transform="translate(49.71201 814.1164) rotate(-73.65991)" fill="#9f616a"/><path d="M776.492,267.66459V256.53335s-8.97669-10.57234.89767-13.23552c0,0,2.693-26.63179,26.03241-14.20362,0,0,32.3161-5.32636,28.72543,13.3159,0,0,8.079-4.8669,5.386,7.56128L832.32518,269.991s2.51535-13.22444-5.56367-14.99989l-4.48835-2.66318s-12.56737,12.42817-31.41843-2.66318c0,0-8.079-1.92825-7.18135,6.06129S776.492,267.66459,776.492,267.66459Z" transform="translate(-279.00005 -145.78971)" fill="#2f2e41"/><path d="M716.00005,611.78971a115.853,115.853,0,0,1-49.68994,95.19c-.27979.2-.56983.4-.85986.59q-2.52027,1.74-5.14014,3.33-3.68994,2.25-7.55029,4.23c-1.55957.8-3.12989,1.56-4.7295,2.28-.40039.18-.81006.37-1.22021.54-2.79,1.24-5.64014,2.37-8.54,3.37a114.20394,114.20394,0,0,1-23.37012,5.52,116.29626,116.29626,0,0,1-14.8999.95c-2.50977,0-5.00977-.08-7.48-.24-2.16016-.14-4.29981-.33-6.41992-.59-3.41016-.41-6.78028-.96-10.1001-1.67-.10986-.02-.23-.05-.33984-.07a113.3187,113.3187,0,0,1-20.15039-6.27c-1.76954-.74-3.51954-1.51-5.23975-2.34q-3.25488-1.53-6.37988-3.27a116.00862,116.00862,0,1,1,172.10986-101.55Z" transform="translate(-279.00005 -145.78971)" fill="#f1f1f1"/><circle cx="317.81344" cy="468.68566" r="25.90295" fill="#ffb8b8"/><path d="M586.10015,726.9597c-3.41016-.41-6.78028-.96-10.1001-1.67l3.1499-70.88.4502-.47,6.4497-6.81h20.51026l7.56982,7.33.64014.63,16.18994,15.51,7.31006,50.72a114.20394,114.20394,0,0,1-23.37012,5.52,116.29626,116.29626,0,0,1-14.8999.95c-2.50977,0-5.00977-.08-7.48-.24C590.35991,727.40971,588.22026,727.21971,586.10015,726.9597Z" transform="translate(-279.00005 -145.78971)" fill="#cbcbcb"/><path d="M550.27007,716.60972q-3.25488-1.53-6.37988-3.27c-.21-19.2-.3501-31.95-.3501-31.95l2.43994-1.49a.80438.80438,0,0,1,.08984-.04l27.68995-16.82,5.81005-9.44.03028.34,1.71,19.9a346.74389,346.74389,0,0,1,11.21,53.71c-2.16016-.14-4.29981-.33-6.41992-.59-3.41016-.41-6.78028-.96-10.1001-1.67-.10986-.02-.23-.05-.33984-.07a113.3187,113.3187,0,0,1-20.15039-6.27C553.74028,718.2097,551.99028,717.43974,550.27007,716.60972Z" transform="translate(-279.00005 -145.78971)" fill="#2f2e41"/><path d="M638.27007,721.31974a114.20394,114.20394,0,0,1-23.37012,5.52,91.26716,91.26716,0,0,1-1.21-19.55c2.16016-34.53-2.81982-53.69-.65967-53.69l1.09961.86,13.59033,10.74,17.88965,6.56h.01026l12.31006,4.51,2.16992.80005v1.03c.00976,3.56.02978,16.02.21,32.8q-3.68994,2.25-7.55029,4.23c-1.55957.8-3.12989,1.56-4.7295,2.28-.40039.18-.81006.37-1.22021.54C644.02007,719.18974,641.17,720.31974,638.27007,721.31974Z" transform="translate(-279.00005 -145.78971)" fill="#2f2e41"/><path d="M572.30783,622.57952s2.2008-3.865,1.68916-16.77648,19.14951-5.60893,35.57847-6.84062,12.95124,21.55611,12.95124,21.55611,1.18525-1.35461,3.72286-12.35267-3.22412-21.95808-3.22412-21.95808c-1.69691-11.5569-10.8421-7.85291-10.8421-7.85291,4.40421,1.71452,3.55833,5.38054,3.55833,5.38054-3.728-6.53621-12.8732-2.83221-12.8732-2.83221-12.197-7.65394-24.55861,2.42534-24.55861,2.42534-14.73463,3.34409-6.09333,15.06193-6.09333,15.06193C557.39833,605.87893,572.30783,622.57952,572.30783,622.57952Z" transform="translate(-279.00005 -145.78971)" fill="#2f2e41"/><path d="M531.31987,705.2797c.38038-8.79.5503-14.46.3501-15.25-1.02978-4.12,13.03028-9.64,14.31006-10.13a.80438.80438,0,0,1,.08984-.04l2.86036,1.53,1.33984,35.22q-3.25488-1.53-6.37988-3.27A115.18056,115.18056,0,0,1,531.31987,705.2797Z" transform="translate(-279.00005 -145.78971)" fill="#2f2e41"/><path d="M660.31011,710.8997q-3.68994,2.25-7.55029,4.23c-1.55957.8-3.12989,1.56-4.7295,2.28-.40039.18-.81006.37-1.22021.54l-4.5-44.43,2.62988-1.92s.24024.06.66992.16h.01026c2.10986.52,8.58984,2.24006,12.31006,4.51a7.71388,7.71388,0,0,1,2.16992,1.83,2.22274,2.22274,0,0,1,.50976,1.58c-.11963,1.16,1.88037,12.16,4.84034,27.89Q662.93,709.30971,660.31011,710.8997Z" transform="translate(-279.00005 -145.78971)" fill="#2f2e41"/><polygon points="158.016 489.633 115 489.633 115 296.788 117 296.788 117 487.633 158.016 487.633 158.016 489.633" fill="#f1f1f1"/><polygon points="527.008 489.633 483.992 489.633 483.992 487.633 525.008 487.633 525.008 295 527.008 295 527.008 489.633" fill="#f1f1f1"/><circle cx="526" cy="227.92126" r="26.43632" fill="#730a0e"/><polygon points="523.481 239.081 515.568 228.907 520.17 225.328 523.916 230.145 536.573 216.785 540.805 220.794 523.481 239.081" fill="#fff"/><circle cx="116" cy="229.98425" r="26.43632" fill="#730a0e"/><polygon points="113.481 241.144 105.568 230.97 110.17 227.391 113.916 232.208 126.573 218.848 130.805 222.857 113.481 241.144" fill="#fff"/><circle cx="321" cy="581.98425" r="26.43632" fill="#730a0e"/><polygon points="318.481 593.144 310.568 582.97 315.17 579.391 318.916 584.208 331.573 570.848 335.805 574.857 318.481 593.144" fill="#fff"/></svg>
               </div>
                <h2>Consultancy</h2>
                <p>We offer consultation services with our wide range of subject matter experts,spread across multiple industries and enterprises for clients to choose from.</p>
            </div>
            <div class="service-divs col-lg-4 col-md-4 col-12">
                <div class="img-container"> 
                 <svg class="services__img" id="e1774615-6c5f-4199-8d8c-187452296bcf" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="200" height="400" viewBox="0 0 734.73628 779.78485"><path d="M967.36814,233.05483h-3.99878V123.50949a63.40184,63.40184,0,0,0-63.40179-63.40191H667.88084a63.40185,63.40185,0,0,0-63.402,63.40172V724.48371a63.40186,63.40186,0,0,0,63.40179,63.40191H899.96726a63.40186,63.40186,0,0,0,63.402-63.40167V311.03107h3.99884Z" transform="translate(-232.63186 -60.10758)" fill="#3f3d56"/><path d="M902.52561,76.60256h-30.295a22.49484,22.49484,0,0,1-20.82715,30.99052H718.444a22.4948,22.4948,0,0,1-20.82715-30.99056H669.32127a47.34781,47.34781,0,0,0-47.34784,47.34774V724.04285a47.34781,47.34781,0,0,0,47.34777,47.34784H902.52561a47.3478,47.3478,0,0,0,47.34784-47.34778h0V123.9503A47.34776,47.34776,0,0,0,902.52561,76.60256Z" transform="translate(-232.63186 -60.10758)" fill="#fff"/><path d="M798.1627,728.88642a89.85864,89.85864,0,1,1,66.44775-29.41327l18.76538,21.03576-9.36432,3.97211c-14.48639,6.14472-28.66235.16559-36.619-4.60626A89.97151,89.97151,0,0,1,798.1627,728.88642Zm0-164.94757a75.18442,75.18442,0,1,0,36.14392,141.12371l4.00873-2.20269,3.72723,2.65216A39.4221,39.4221,0,0,0,856.267,712.02l-11.80835-13.23675,5.17614-4.8642a74.47632,74.47632,0,0,0,23.71234-54.79572A75.26973,75.26973,0,0,0,798.1627,563.93885Z" transform="translate(-232.63186 -60.10758)" fill="#e6e6e6"/><path d="M880.63645,639.12317a82.44129,82.44129,0,1,0-42.8197,72.32837c5.70105,4.05634,19.609,12.147,33.34833,6.31909L854.6265,699.23126A82.23982,82.23982,0,0,0,880.63645,639.12317Z" transform="translate(-232.63186 -60.10758)" fill="#fff"/><rect x="523.05395" y="562.15271" width="58.93216" height="5.47272" fill="#a0152d"/><rect x="523.05395" y="581.08453" width="102.71378" height="5.47272" fill="#e6e6e6"/><rect x="523.05395" y="600.0163" width="102.61319" height="5.47272" fill="#e6e6e6"/><path d="M798.1627,329.88639a89.85859,89.85859,0,1,1,66.44775-29.41324l18.76538,21.03579-9.36432,3.97211c-14.48639,6.14472-28.66235.16556-36.619-4.60629A89.9719,89.9719,0,0,1,798.1627,329.88639Zm0-164.94756a75.18443,75.18443,0,1,0,36.14392,141.12373l4.00873-2.20266,3.72723,2.65216A39.4221,39.4221,0,0,0,856.267,313.02l-11.80835-13.23675,5.17614-4.86417a74.4765,74.4765,0,0,0,23.71234-54.79578,75.26971,75.26971,0,0,0-75.18444-75.18444Z" transform="translate(-232.63186 -60.10758)" fill="#e6e6e6"/><path d="M880.63645,240.1232a82.44137,82.44137,0,1,0-42.8197,72.32837c5.70105,4.05631,19.609,12.14707,33.34833,6.31906l-16.53858-18.5394A82.23979,82.23979,0,0,0,880.63645,240.1232Z" transform="translate(-232.63186 -60.10758)" fill="#fff"/><rect x="523.05395" y="163.15269" width="58.93216" height="5.4727" fill="#a0152d"/><rect x="523.05395" y="182.0845" width="102.71378" height="5.4727" fill="#e6e6e6"/><rect x="523.05395" y="201.01633" width="102.61319" height="5.4727" fill="#e6e6e6"/><circle cx="679.76773" cy="264.44629" r="13" fill="#e6e6e6"/><circle cx="679.76773" cy="663.44629" r="13" fill="#e6e6e6"/><path d="M625.30534,536.11564c-9.5135,5.70547-26.46313,12.85456-43.78391,5.50757l-11.19653-4.74934,22.437-25.15166a107.15648,107.15648,0,1,1,32.5434,24.39343Z" transform="translate(-232.63186 -60.10758)" fill="#a0152d"/><path d="M762.59857,439.06616a98.6152,98.6152,0,0,0-89.895-98.22284c2.87241-.25161,5.7779-.38776,8.71557-.38776a98.6106,98.6106,0,0,1,0,197.22116c-2.93324,0-5.83375-.13791-8.7018-.389A98.61525,98.61525,0,0,0,762.59857,439.06616Z" transform="translate(-232.63186 -60.10758)" opacity="0.1" style="isolation:isolate"/><rect x="382.95641" y="359.29429" width="70.46282" height="6.54348" fill="#fff"/><rect x="382.95641" y="381.93032" width="122.81076" height="6.54348" fill="#fff"/><rect x="382.95641" y="404.56632" width="122.69052" height="6.54348" fill="#fff"/><path d="M233.63186,839.89242h381a1,1,0,0,0,0-2h-381a1,1,0,0,0,0,2Z" transform="translate(-232.63186 -60.10758)" fill="#ccc"/><path d="M416.41683,409.62739l1.50587-7.52935s22.14933-7.52935,24.62749,7.52935Z" transform="translate(-232.63186 -60.10758)" fill="#e6e6e6"/><polygon points="226.294 764.098 240.815 764.097 247.723 708.088 226.291 708.089 226.294 764.098" fill="#9f616a"/><path d="M455.22155,819.46461l28.59689-.00116h.00116a18.22516,18.22516,0,0,1,18.22418,18.22389v.59222l-46.82136.00173Z" transform="translate(-232.63186 -60.10758)" fill="#2f2e41"/><polygon points="156.294 764.098 170.815 764.097 177.723 708.088 156.291 708.089 156.294 764.098" fill="#9f616a"/><path d="M385.22155,819.46461l28.59689-.00116h.00116a18.22516,18.22516,0,0,1,18.22418,18.22389v.59222l-46.82136.00173Z" transform="translate(-232.63186 -60.10758)" fill="#2f2e41"/><polygon points="162.703 381.143 146.138 379.637 135.597 429.331 137.103 474.507 153.668 534.742 176.256 521.189 164.209 459.448 162.703 381.143" fill="#2f2e41"/><polygon points="152.218 529.471 155.926 561.094 159.409 634.882 151.409 744.84 180.02 743.305 194.044 628.859 202.608 576.153 214.655 636.388 222.185 749.328 251.549 746.975 251.549 635.991 252.302 555.071 241.761 523.448 152.218 529.471" fill="#2f2e41"/><path d="M446.53422,411.13325s-10.54108-15.05869-30.11739-4.5176l-9.03522,12.04695-28.61152,21.08218,6.02348,70.77586L377.26422,599.367,484.181,597.86108l-18.07043-88.8463V414.145Z" transform="translate(-232.63186 -60.10758)" fill="#2f2e41"/><polygon points="155.926 404.632 147.292 507.871 158.185 451.919 155.926 404.632" opacity="0.25"/><path d="M568.28389,551.29919a11.10634,11.10634,0,0,1-14.55276-8.84574l-24.63864-6.08917.04853-15.87535,34.67376,9.08778a11.16654,11.16654,0,0,1,4.46911,21.72248Z" transform="translate(-232.63186 -60.10758)" fill="#9f616a"/><rect x="533.59292" y="527.80238" width="24.09391" height="10.54109" transform="translate(-305.95057 918.81273) rotate(-80.09845)" fill="#e6e6e6"/><circle cx="429.77597" cy="363.50007" r="30.23918" transform="translate(-354.32115 190.58405) rotate(-28.66319)" fill="#9f616a"/><path d="M432.03476,390.17478a30.67347,30.67347,0,0,1-20.06795-57.65152,35.86829,35.86829,0,0,1,16.936-3.03923c9.04372.47548,17.83367,3.818,26.88653,3.57174l1.31214,2.10915,4.94513-1.1993,1.05965,3.92608,1.30256-.04509c2.33327,4.336-1.42084,10.54381-6.34451,10.49127-1.94936-.0208-3.79255-.83293-5.69875-1.24139s-4.151-.30666-5.46543,1.133c-1.70825,1.871-.96462,4.79061-.60844,7.299s-.53342,5.887-3.06559,5.96885c-1.2935.04183-2.52372-.88578-3.79472-.64189-1.4804.28406-2.22892,2.07169-2.01278,3.56352a14.18014,14.18014,0,0,0,1.77124,4.135c3.67068,7.32734.57119,17.29465-6.60746,21.24822" transform="translate(-232.63186 -60.10758)" fill="#2f2e41"/><path d="M458.92308,419.96341l7.18745-5.81842s14.50589-1.00847,14.24393,14.36948l23.21047,72.6043,44.52756,15.77365-6,31-63-24-32-53.03959Z" transform="translate(-232.63186 -60.10758)" fill="#2f2e41"/></svg>
                </div>
                 <h2>Services</h2>
                 <p>We provide specific industry related services which augments for those seeking our services and consultancies for quicker conclusions from a holistic and wider perspective through our specialist and consultants spread across various continents.</p>
             </div>
             <div class="service-divs col-lg-4 col-md-4 col-12">
                <div class="img-container"> 
                <svg class="services__img" id="a36694c7-9e7e-4fa0-bd34-1ff06c34a584" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="1089.86663" height="822.50661" viewBox="0 0 1089.86663 822.50661"><title>certificate</title><path d="M988.80331,484.3133c0,126.51-74.17,238.43-187.87,306.56-72.9,43.69-162.06,69.38-258.33,69.38-128.25,0-226.08-48.47-299.67-122.72-67.83-68.42-115.06-158.75-146.53-253.22-140.49-421.79,94.2-536.86,446.2-375.94C766.72329,210.84327,988.80331,276.69331,988.80331,484.3133Z" transform="translate(-55.06669 -38.74669)" fill="#8e0738"/><path d="M800.93331,263.50331v528.37c-72.9,43.69-162.06,69.38-258.33,69.38-128.25,0-226.08-48.47-299.67-122.72v-475.03Z" transform="translate(-55.06669 -38.74669)" fill="#f2f2f2"/><path d="M296.60406,520.9551a349.10769,349.10769,0,0,1,90.1557-16.07316,282.15087,282.15087,0,0,1,45.97047,1.7986,287.56233,287.56233,0,0,1,44.61626,9.55207c14.4206,4.17522,28.64209,8.99849,43.01405,13.33329a401.17806,401.17806,0,0,0,44.45525,10.84819,376.87356,376.87356,0,0,0,45.16986,5.38371c15.00305.87194,30.15309,1.0421,45.11414-.55621a138.0256,138.0256,0,0,0,40.59011-10.28933A123.97053,123.97053,0,0,0,728.70055,513.779q3.67222-3.2781,7.06609-6.84515c1.33469-1.39522-.78353-3.51978-2.12132-2.12132-19.12461,19.99191-44.26195,32.38806-71.527,36.52762-14.853,2.25509-29.98981,2.38592-44.97348,1.80438a370.06082,370.06082,0,0,1-45.71483-4.619A382.03123,382.03123,0,0,1,527.155,528.4477c-14.28794-4.13931-28.38132-8.91171-42.61931-13.21479a320.72782,320.72782,0,0,0-43.87857-10.45407,275.93839,275.93839,0,0,0-45.01855-3.12473A344.20143,344.20143,0,0,0,306.666,514.82967q-5.45484,1.53164-10.85948,3.23259c-1.836.5756-1.05209,3.47271.79752,2.89284Z" transform="translate(-55.06669 -38.74669)" fill="#3f3d56"/><path d="M296.60406,596.9551a349.10769,349.10769,0,0,1,90.1557-16.07316,282.15087,282.15087,0,0,1,45.97047,1.7986,287.56233,287.56233,0,0,1,44.61626,9.55207c14.4206,4.17522,28.64209,8.99849,43.01405,13.33329a401.17806,401.17806,0,0,0,44.45525,10.84819,376.87356,376.87356,0,0,0,45.16986,5.38371c15.00305.87194,30.15309,1.0421,45.11414-.55621a138.0256,138.0256,0,0,0,40.59011-10.28933A123.97053,123.97053,0,0,0,728.70055,589.779q3.67222-3.2781,7.06609-6.84515c1.33469-1.39522-.78353-3.51978-2.12132-2.12132-19.12461,19.99191-44.26195,32.38806-71.527,36.52762-14.853,2.25509-29.98981,2.38592-44.97348,1.80438a370.06082,370.06082,0,0,1-45.71483-4.619A382.03123,382.03123,0,0,1,527.155,604.4477c-14.28794-4.13931-28.38132-8.91171-42.61931-13.21479a320.72782,320.72782,0,0,0-43.87857-10.45407,275.93839,275.93839,0,0,0-45.01855-3.12473A344.20143,344.20143,0,0,0,306.666,590.82967q-5.45484,1.53164-10.85948,3.23259c-1.836.5756-1.05209,3.47271.79752,2.89284Z" transform="translate(-55.06669 -38.74669)" fill="#3f3d56"/><path d="M296.60406,451.9551a349.10769,349.10769,0,0,1,90.1557-16.07316,282.15087,282.15087,0,0,1,45.97047,1.7986,287.56233,287.56233,0,0,1,44.61626,9.55207c14.4206,4.17522,28.64209,8.99849,43.01405,13.33329a401.17806,401.17806,0,0,0,44.45525,10.84819,376.87356,376.87356,0,0,0,45.16986,5.38371c15.00305.87194,30.15309,1.0421,45.11414-.55621a138.0256,138.0256,0,0,0,40.59011-10.28933A123.97053,123.97053,0,0,0,728.70055,444.779q3.67222-3.2781,7.06609-6.84515c1.33469-1.39522-.78353-3.51978-2.12132-2.12132-19.12461,19.99191-44.26195,32.38806-71.527,36.52762-14.853,2.25509-29.98981,2.38592-44.97348,1.80438A370.06082,370.06082,0,0,1,571.43,469.52557,382.03123,382.03123,0,0,1,527.155,459.4477c-14.28794-4.13931-28.38132-8.91171-42.61931-13.21479a320.72782,320.72782,0,0,0-43.87857-10.45407,275.93839,275.93839,0,0,0-45.01855-3.12473A344.20143,344.20143,0,0,0,306.666,445.82967q-5.45484,1.53163-10.85948,3.23259c-1.836.5756-1.05209,3.47271.79752,2.89284Z" transform="translate(-55.06669 -38.74669)" fill="#3f3d56"/><path d="M293.02966,321.49617c7.25838-3.21556,15.5732-2.65483,23.1061-.79035,8.12236,2.01037,15.771,5.50661,23.76662,7.924a82.27145,82.27145,0,0,0,43.97788.83424,81.06329,81.06329,0,0,0,23.03191-9.8719c1.63065-1.025.12677-3.62188-1.51415-2.59041a79.4874,79.4874,0,0,1-42.31964,12.06472,77.64725,77.64725,0,0,1-22.15352-3.262c-7.93732-2.3799-15.52474-5.83513-23.56552-7.88447-8.51912-2.17125-17.65485-2.6421-25.84384.98574-1.76158.7804-.237,3.36618,1.51416,2.59041Z" transform="translate(-55.06669 -38.74669)" fill="#3f3d56"/><circle cx="460.86663" cy="696.75661" r="46" fill="#3f3d56"/><circle cx="212.86663" cy="105.75661" r="25" fill="#f2f2f2"/><circle cx="431.86663" cy="176.75661" r="17" fill="#f2f2f2"/><circle cx="155.86663" cy="339.75661" r="17" fill="#f2f2f2"/><rect x="85.547" y="213.46424" width="1.8747" height="335.24432" fill="#3f3d56"/><ellipse cx="86.84593" cy="436.55402" rx="36.55673" ry="83.42433" fill="#3f3d56"/><ellipse cx="86.84593" cy="246.27156" rx="36.55673" ry="83.42433" fill="#3f3d56"/><path d="M142.81061,216.86068l-1.796-.53824c.1135-.379,11.13471-38.14721-6.962-62.4607-10.22116-13.73165-27.76036-20.69451-52.13059-20.69451v-1.87471c24.9991,0,43.04588,7.21917,53.6396,21.457C154.21857,177.82509,142.92686,216.47347,142.81061,216.86068Z" transform="translate(-55.06669 -38.74669)" fill="#3f3d56"/><circle cx="26.8554" cy="93.48318" r="23.4338" fill="#3f3d56"/><path d="M825.8065,663.424,808.274,824.72309H929.24832l5.25976-12.27276,7.013,12.27276h113.96133s-8.76625-166.55887-24.54551-171.81863S825.8065,663.424,825.8065,663.424Z" transform="translate(-55.06669 -38.74669)" fill="#2f2e41"/><circle cx="874.18164" cy="209.15673" r="61.36379" fill="#ffb8b8"/><path d="M894.1833,286.475s5.25975,56.104,0,59.61054,84.15606,1.75326,84.15606,1.75326-12.27276-50.84429,0-75.38981Z" transform="translate(-55.06669 -38.74669)" fill="#ffb8b8"/><path d="M925.74182,333.81273s45.11322,7.02643,48.85538-7.00629l23.02792,31.55181,1.75325,315.58523s-187.59788,22.79227-194.61089-14.026,71.88331-327.858,71.88331-327.858l19.86216-1.28572S922.23532,333.81273,925.74182,333.81273Z" transform="translate(-55.06669 -38.74669)" fill="#d0cde1"/><path d="M896.21439,316.37533l-30.08311,10.4244-85.90931,21.039,3.5065,210.39015s-73.63655,210.39015-40.32478,226.16941,80.64956-21.039,94.67557-47.33779,63.117-390.975,63.117-397.988S896.21439,316.37533,896.21439,316.37533Z" transform="translate(-55.06669 -38.74669)" fill="#3f3d56"/><path d="M973.47025,316.37533l11.88211,10.4244,84.15606,38.57153-42.078,212.1434s56.104,192.85764,35.065,203.37715-52.59754,40.32478-59.61054,22.79226S954.57513,335.7562,973.47025,316.37533Z" transform="translate(-55.06669 -38.74669)" fill="#3f3d56"/><path d="M1022.17064,596.80042s-78.89631-33.31177-80.64956-3.5065,89.41582,50.84429,89.41582,42.078S1022.17064,596.80042,1022.17064,596.80042Z" transform="translate(-55.06669 -38.74669)" fill="#ffb8b8"/><path d="M829.313,584.52767s91.16907,68.37679,56.104,85.90931-80.64956-61.3638-80.64956-61.3638Z" transform="translate(-55.06669 -38.74669)" fill="#ffb8b8"/><path d="M956.49132,158.01513a3.38451,3.38451,0,0,1,3.25676-1.93273c-28.09345-1.68046-57.68462,1.59391-81.18765,17.0753-6.58229,4.33573-12.72923,9.6376-20.22289,12.081l6.08267,4.77011-7.26763,2.21543,10.69544,6.91263a9.27045,9.27045,0,0,1-8.82861,2.95773c4.64818,1.358,8.07046,5.49439,9.80869,10.01416s2.05052,9.44217,2.34418,14.27575c1.79656-6.9743,9.408-11.07972,16.59785-11.49687s14.2019,1.95512,21.19907,3.66045a117.27154,117.27154,0,0,0,46.548,1.79065c-5.25649,10.54877-.82242,23.13119,3.63955,34.03981L968.066,276.1598c4.94626.49749,8.44239-4.42141,12.16886-7.71176,3.39641-2.99892-10.12543,23.37638-8.03185,22.41,2.71982-1.25539,31.42131-32.94373,32.76537-35.62084,6.13213-12.21409,9.81123-25.8377,9.25789-39.4935s-5.55-27.31832-14.96291-37.2275c-6.39033-6.72714-15.23132-7.90529-21.746-13.49635-2.56408-2.20055-2.57349-3.91969-6.09717-5.20273C970.24979,159.391,956.68486,157.58563,956.49132,158.01513Z" transform="translate(-55.06669 -38.74669)" fill="#2f2e41"/><path d="M792.49472,353.0985,780.222,347.83875,682.0399,509.13786s-17.53252,42.078,14.026,61.3638S801.261,647.64471,801.261,647.64471l42.078-64.8703s-85.90931-40.32478-80.64956-56.104,33.31178-57.85729,33.31178-57.85729Z" transform="translate(-55.06669 -38.74669)" fill="#3f3d56"/><path d="M1046.71616,361.86476l22.79226,3.5065s94.67557,185.84463,71.88331,220.90966S1025.67714,670.437,1025.67714,670.437s-1.75325-57.85729-17.53251-78.89631l54.35079-21.039-29.80527-115.71459Z" transform="translate(-55.06669 -38.74669)" fill="#3f3d56"/></svg>   
                </div>
                 <h2>Careers</h2>
                 <p>Interns and Volunteering services.</p>
             </div>
          </div>
    </div>
</section>
<div style="background:rgb(243, 240, 240); ">
<?php include "outerpagefooter.php"?>
</div>
<script>
function find_expert()
{
    window.location.href="clientpage.php";
}
</script>

</body>
</html>