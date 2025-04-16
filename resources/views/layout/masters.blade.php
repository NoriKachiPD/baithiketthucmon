<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield(section: 'title')</title>
    <link rel="icon" href="@yield('favicon')">
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="source/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="source/assets/dest/vendors/colorbox/example3/colorbox.css">
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
    <link rel="stylesheet" href="source/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/style.css">
	<link rel="stylesheet" href="source/assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/huong-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('source/assets/dest/css/style.css') }}">
    @yield('styles')
</head>
<body>
    
    @include('layout.header')
    
    <main class="container mt-4">
        @yield('content')
    </main>
    
    @include('layout.footer')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('source/assets/dest/js/jquery.js') }}"></script>
    @yield('scripts')

    <style>
  * {
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
  }

  body {
    margin: 0;
    background: #f4f4f4;
  }

  .chat-bubble {
  position: fixed;
  bottom: 20px;
  right: 20px;
  background: linear-gradient(135deg, #ff512f, #dd2476);
  color: white;
  font-size: 24px;
  font-weight: bold;
  padding: 14px;
  border-radius: 50%;
  cursor: pointer;
  z-index: 1000;
  box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  transform: rotateX(10deg) rotateY(10deg);
  width: 57px;
  height: 57px;
  display: flex;
  align-items: center;
  justify-content: center;
  transform-style: preserve-3d; /* giữ khối 3D */
  perspective: 800px;
}

/* Tạo chiều dày bằng lớp giả phía sau */
.chat-bubble::before {
  content: '';
  position: absolute;
  width: 100%;
  height: 100%;
  border-radius: 50%;
  background: linear-gradient(135deg, #ff512f, #dd2476);
  transform: translateZ(-10px); /* đẩy về sau */
  z-index: -1;
}

/* Hover vẫn giữ như cũ */
.chat-bubble:hover {
  transform: scale(1.05) rotateX(-41deg) rotateY(41deg);
  box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
}

/* Tooltip */
.chat-bubble::after {
  content: 'Bạn cần giúp đỡ?';
  position: absolute;
  bottom: 110%;
  right: 0;
  background: linear-gradient(to right, #ff512f, #dd2476);
  color: #fff;
  padding: 6px 12px;
  border-radius: 8px;
  font-size: 19px;
  font-weight: 600;
  white-space: nowrap;
  opacity: 0;
  transform: translateY(10px);
  pointer-events: none;
  transition: all 0.3s ease;
  margin-bottom: 10px;
}

.chat-bubble:hover::after {
  opacity: 1;
  transform: translateY(0);
}

  .chat-box {
    position: fixed;
    bottom: 90px;
    right: 20px;
    width: 320px;
    height: 430px;
    background: white;
    border-radius: 15px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
    display: flex;
    flex-direction: column;
    overflow: hidden;
    z-index: 999;
    transform: translateY(100%);
    opacity: 0;
    transition: all 0.4s ease;
    pointer-events: none;
    margin-bottom: 20px;
  }

  .chat-box.open {
    transform: translateY(0);
    opacity: 1;
    pointer-events: auto;
  }

  .chat-header {
    background: linear-gradient(to right, #ff512f, #dd2476);
    color: white;
    padding: 14px;
    font-weight: bold;
    font-size: 18px;
    text-align: center;
    cursor: pointer;
  }

  .chat-content {
    flex: 1;
    padding: 12px;
    overflow-y: auto;
    background: #f9f9f9;
  }

  .chat-message {
    display: flex;
    margin-bottom: 10px;
    max-width: 90%;
    animation: slideIn 0.3s ease;
  }

  .chat-message .message {
    padding: 10px 14px;
    border-radius: 20px;
    font-size: 15px;
    font-weight: 500;
    position: relative;
  }

  .message-app {
    background: linear-gradient(to right, #ff512f, #dd2476);
    color: white;
    border-top-left-radius: 0;
    align-self: flex-start;
  }

  .message-client {
    background: #ffd9d9;
    color: #333;
    border-top-right-radius: 0;
    margin-left: auto;
    align-self: flex-end;
    font-weight: 500;
  }

  .chat-footer {
    display: flex;
    padding: 10px;
    background: #f1f1f1;
    border-top: 1px solid #ddd;
  }

  .chat-footer input {
    flex: 1;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 20px;
    outline: none;
    font-size: 15px;
  }

  .chat-footer button {
    background: linear-gradient(to right, #ff512f, #dd2476);
    color: white;
    border: none;
    padding: 10px 16px;
    border-radius: 20px;
    margin-left: 8px;
    cursor: pointer;
    transition: 0.3s;
    font-weight: bold;
    font-size: 15px;
  }

  .chat-footer button:hover {
    background: linear-gradient(to right, #e84118, #c31432);
  }

  .chat-content::-webkit-scrollbar {
    width: 6px;
  }

  .chat-content::-webkit-scrollbar-thumb {
    background: #ccc;
    border-radius: 10px;
  }

  @keyframes slideIn {
    from {
      transform: translateY(20px);
      opacity: 0;
    }
    to {
      transform: translateY(0);
      opacity: 1;
    }
  }
</style>
</head>
<body>

<!-- Chat Bubble -->
<div class="chat-bubble-wrapper">
<div class="chat-bubble" id="chatBubble">💬</div>
</div>
<!-- Chat Box -->
<div class="chat-box" id="chatBox">
<div class="chat-header" id="chatHeader" style="display: flex; align-items: center; gap: 8px;">
  <img src="{{ asset('images/2.jpg') }}" alt="NoriKachi" style="height: 24px; width: 24px; border-radius: 50%;">
  <span>Trò chuyện cùng NoriKachi</span>
</div>
  <div class="chat-content" id="chatContent"></div>
  <div class="chat-footer">
    <input type="text" id="messageInput" placeholder="Nhập tin nhắn..." />
    <button id="sendBtn">Gửi</button>
  </div>
</div>

  <script>
    const chatBubble = document.getElementById('chatBubble');
    const chatBox = document.getElementById('chatBox');
    const chatHeader = document.getElementById('chatHeader');
    const chatContent = document.getElementById('chatContent');
    const sendBtn = document.getElementById('sendBtn');
    const messageInput = document.getElementById('messageInput');

    const messages = [
      { sender: 'app', text: '👋 Xin chào! Chúng tôi có thể giúp gì cho bạn?' },
      { sender: 'app', text: 'Bạn cứ nhắn tin, chúng tôi sẽ phản hồi ngay nhé!' }
    ];

    function renderMessages() {
      chatContent.innerHTML = '';
      messages.forEach(msg => {
        const div = document.createElement('div');
        div.className = 'chat-message';
        const msgDiv = document.createElement('div');
        msgDiv.className = `message ${msg.sender === 'app' ? 'message-app' : 'message-client'}`;
        msgDiv.innerText = msg.text;
        div.appendChild(msgDiv);
        chatContent.appendChild(div);
      });
      chatContent.scrollTop = chatContent.scrollHeight;
    }

    function sendMessage() {
    const text = messageInput.value.trim();
    if (text === '') return;

    messages.push({ sender: 'client', text });
    messageInput.value = '';
    renderMessages();

    // Danh sách câu hỏi - phản hồi cụ thể (30 câu)
    const keywordResponses = {
      'hello': '👋 Xin chào! Tôi có thể giúp gì cho bạn?',
      'hi': '👋 Xin chào bạn! Cần tôi hỗ trợ gì không?',
      'xin chào': '👋 Chào bạn! Bạn cần hỗ trợ điều gì?',
      'chào': '👋 Chào bạn! Rất vui được hỗ trợ.',
      'bạn là ai': '🤖 Tôi là trợ lý ảo, sẵn sàng giúp bạn 24/7.',
      'giờ làm việc': '🕒 Chúng tôi làm việc từ 8:00 đến 17:30 mỗi ngày (trừ Chủ Nhật).',
      'địa chỉ': '📍 Chúng tôi ở 99 Tô Hiến Thành, Phước Mỹ, Sơn Trà, Đà Nẵng.',
      'sản phẩm': '🛍️ Bạn đang quan tâm đến sản phẩm nào cụ thể ạ?',
      'giá cả': '💰 Bạn vui lòng cho biết sản phẩm nào để chúng tôi báo giá chi tiết.',
      'bảo hành': '🛠️ Tất cả sản phẩm đều được bảo hành 12 tháng.',
      'giao hàng': '🚚 Chúng tôi giao hàng toàn quốc trong 2-5 ngày làm việc.',
      'phí ship': '📦 Phí ship dao động từ 20-50k tùy khu vực.',
      'liên hệ': '📞 Bạn có thể gọi 0935 370 171 hoặc nhắn tin tại đây.',
      'zalo': '📲 Bạn có thể liên hệ qua Zalo: 0935 370 171.',
      'facebook': '📘 Đây là fanpage của chúng tôi: https://www.facebook.com/share/1BJUxMwoz1/',
      'hướng dẫn sử dụng': '📘 Vui lòng cho biết bạn muốn hướng dẫn sản phẩm nào?',
      'cách mua hàng': '🛒 Bạn có thể đặt hàng tại website hoặc inbox tại đây.',
      'hủy đơn': '❌ Vui lòng cung cấp mã đơn để chúng tôi hỗ trợ hủy.',
      'đổi trả': '🔄 Sản phẩm lỗi do NSX sẽ được đổi mới trong 7 ngày.',
      'lỗi sản phẩm': '⚠️ Bạn vui lòng mô tả lỗi để chúng tôi hỗ trợ chính xác.',
      'có ship cod không': '📦 Có ạ! Chúng tôi hỗ trợ COD toàn quốc.',
      'có ship cod ko': '📦 Có ạ! Chúng tôi hỗ trợ COD toàn quốc.',
      'trả góp': '💳 Hiện tại chúng tôi chưa hỗ trợ trả góp.',
      'giảm giá': '🎉 Bạn có thể kiểm tra mục *Khuyến mãi* để xem ưu đãi.',
      'có ship cod không?': '📦 Có ạ! Chúng tôi hỗ trợ COD toàn quốc.',
      'có ship cod ko?': '📦 Có ạ! Chúng tôi hỗ trợ COD toàn quốc.',
      'tư vấn': '👩‍💼 Bạn cần tư vấn sản phẩm nào ạ?',
      'mở cửa lúc mấy giờ': '🕘 Chúng tôi mở cửa từ 8:00 sáng.',
      'đóng cửa lúc mấy giờ': '🕔 Chúng tôi đóng cửa lúc 17:30 chiều.',
      'ngày nghỉ': '📅 Chúng tôi nghỉ vào Chủ Nhật hàng tuần.',
      'tuyển dụng': '🧑‍💼 Hiện tại chúng tôi chưa có nhu cầu tuyển dụng.',
      'việc làm': '💼 Bạn có thể theo dõi fanpage để cập nhật khi có tuyển dụng.',
      'phản hồi chậm': '🙏 Xin lỗi bạn vì phản hồi chậm. Chúng tôi sẽ trả lời ngay.',
      'mua sỉ': '📦 Bạn vui lòng để lại thông tin, bộ phận kinh doanh sẽ liên hệ.',
      'gọi lại': '📲 Bạn vui lòng để lại số điện thoại, chúng tôi sẽ gọi lại sớm nhất.',
      'bánh mì': '🥖 Bánh mì của chúng tôi luôn tươi ngon mỗi ngày! Bạn muốn mua loại nào ạ?',
      'bánh mì có gì': '🥪 Chúng tôi có bánh mì thịt, bánh mì chả, bánh mì trứng, và nhiều loại khác!',
      'giá bánh mì': '💰 Giá bánh mì từ 15k đến 25k tuỳ loại ạ.',
      'bánh mì bao nhiêu': '📌 Giá bánh mì phổ biến là 20k/ổ. Có thể thay đổi theo loại và nhân.',
      'bánh mì thịt': '🥩 Bánh mì thịt đầy đặn, rau dưa và nước sốt đặc biệt. Bạn muốn đặt mấy ổ ạ?',
      'bánh mì chay': '🌱 Bánh mì chay gồm pate chay, rau và nước tương thơm ngon.',
      'bánh mì trứng': '🍳 Bánh mì trứng chiên thơm giòn, rất được ưa chuộng vào buổi sáng!',
      'bánh mì pate': '🧈 Bánh mì pate béo ngậy, thơm ngon – lựa chọn hoàn hảo cho bữa sáng!',
      'giao bánh mì': '🚴‍♂️ Chúng tôi có giao bánh mì tận nơi trong nội thành. Bạn ở khu vực nào?',
      'đặt bánh mì': '📝 Bạn có thể đặt qua chat hoặc gọi hotline: 0935 370 171.',
      'bán sỉ bánh mì': '📦 Có ạ! Chúng tôi nhận đơn sỉ từ 20 ổ trở lên với giá ưu đãi.',
      'bánh mì bao lâu có': '⏱ Thời gian giao từ 15-30 phút tùy khu vực.',
      'bánh mì có cay không': '🌶 Bánh mì mặc định không cay, bạn có thể yêu cầu thêm tương ớt nhé!',
      'bánh mì ngon không': '😋 Rất ngon ạ! Bánh mì được làm từ nguyên liệu tươi và chuẩn vị.',
      'combo bánh mì': '🥪+🥤 Combo bánh mì + nước giá chỉ 35k, siêu tiết kiệm!',
      'bánh mì bán lúc mấy giờ': '🕗 Chúng tôi bán bánh mì từ 6:30 sáng đến 6:00 chiều.',
      'bánh mì có trứng không': '🍳 Có ạ! Bạn có thể chọn thêm trứng, pate, chả hoặc xá xíu.',
      'bánh mì ở đâu': '📍 Bánh mì được bán tại cửa hàng 99 Tô Hiến Thành, Phước Mỹ, Sơn Trà, Đà Nẵng.',
      'mua bánh mì ở đâu': '📍 Đến trực tiếp hoặc đặt online đều được ạ!',
      'có bánh mì ngọt không': '🍞 Hiện tại chúng tôi chỉ bán bánh mì mặn. Bánh mì ngọt sẽ sớm ra mắt!',
      'có nước uống không': '🥤 Có luôn ạ! Trà tắc, trà đào, nước suối, nước ngọt đều có đủ.',
      'menu đồ ăn': '📋 Chúng tôi có bánh mì, xôi, bún thịt nướng, cơm gà,...',
      'ăn sáng': '🍽 Bạn muốn ăn sáng với bánh mì, xôi hay mì gói ạ?',
      'đồ ăn trưa': '🍛 Cơm gà, bún bò, bánh mì đều phục vụ từ 10h30 đến 13h30.',
      'ăn vặt': '🍟 Chúng tôi có xúc xích, nem chua rán, khô gà, snack các loại!',
      'món bán chạy': '🔥 Bánh mì xíu mại và bánh mì trứng là 2 món bán chạy nhất!',
      'bán gì': '🛍️ Chúng tôi bán bánh mì, nước uống, đồ ăn nhanh và phụ kiện điện thoại.',
      'đặt hàng': '🛒 Bạn cần đặt món gì? Mình sẽ hỗ trợ ngay.',
      'có đặt trước không': '📆 Có thể đặt trước qua chat hoặc gọi hotline.',
      'mua bao nhiêu được giảm': '💸 Mua từ 10 ổ bánh mì trở lên sẽ được giảm 10%.',
      'giữ nóng không': '🔥 Có ạ! Chúng tôi sử dụng túi giữ nhiệt khi giao.',
      'bán nước không': '🥤 Có các loại nước đóng chai và nước pha tại chỗ.',
      'bánh mì có pate không': '🧈 Có ạ! Pate được làm mỗi ngày, cực kỳ thơm ngon.',
      'có hoá đơn không': '🧾 Có hóa đơn nếu bạn cần, vui lòng báo trước khi thanh toán.',
      'giao buổi tối': '🌙 Hiện tại chỉ giao đến 18h. Bạn có thể đặt trước hôm sau.',
      'giao liền được không': '🚀 Nếu bạn ở gần, bên mình có thể giao liền trong 15 phút!',
      'bánh mì nhiều nhân': '🥙 Bạn có thể yêu cầu thêm nhân (trứng, chả, pate...) chỉ thêm 5k/món.',
      'bánh mì ít rau': '🥬 Được ạ! Bạn muốn ít rau hoặc không rau, bên mình sẽ làm theo ý bạn.',
      'bánh mì ít nước sốt': '🧴 Bạn có thể ghi chú để bên mình điều chỉnh lượng nước sốt.',
      'đóng gói thế nào': '📦 Mỗi bánh mì được bọc giấy bạc giữ ấm và túi giấy thân thiện môi trường.',
      'bánh mì truyền thống': '🥖 Bánh mì thịt nguội, pate, dưa leo, rau ngò – chuẩn vị Việt!',
      'bánh mì đặc biệt': '⭐ Bánh mì đặc biệt gồm thịt nguội, pate, trứng, xíu mại đầy đủ topping.',
      'bánh mì xíu mại': '🥩 Viên xíu mại to tròn, sốt đậm đà – ăn 1 lần là nhớ mãi!',
      'bánh mì chảo': '🍳 Bánh mì chảo dùng tại quán gồm trứng ốp, xúc xích, pate và nước sốt.',
      'khuyến mãi hôm nay': '🎁 Mua 3 tặng 1 bánh mì trứng từ 7h-9h sáng. Đặt liền kẻo hết nhé!',
      'mua nhiều được tặng gì': '🎉 Mua từ 5 ổ trở lên sẽ được tặng 1 lon nước ngẫu nhiên!',
      'ship tận nơi': '📬 Có ship tận nơi trong bán kính 5km. Miễn phí ship cho đơn trên 100k.',
      'có app không': '📱 Hiện tại bạn có thể đặt qua Zalo, Facebook hoặc gọi trực tiếp.',
      'có thanh toán online không': '💳 Có hỗ trợ chuyển khoản và QR code thanh toán nhanh.',

      'bánh mì trưa có không': '🥪 Có ạ! Bánh mì trưa được phục vụ liên tục đến 13h30.',
      'bánh mì chiều còn không': '⏰ Chiều vẫn còn bánh mì, bạn muốn loại nào để mình giữ phần nhé!',
      'mua 1 ổ được khuyến mãi không': '🎁 Mua 1 ổ thì chưa có khuyến mãi, bạn mua thêm sẽ có ưu đãi hấp dẫn hơn!',
      'có nhận đặt bánh mì theo yêu cầu không': '📝 Có ạ! Bạn muốn không rau, không cay, thêm trứng… cứ nói nhé!',
      'bánh mì bao lâu hết': '⏳ Thường đến 5h chiều là hết hàng rồi, bạn nên đặt sớm nhé!',
      'có giao qua grab không': '🚕 Có thể đặt qua GrabFood, ShopeeFood hoặc liên hệ trực tiếp bên mình.',
      'bánh mì ăn kèm gì ngon': '😋 Ăn cùng trà tắc, trà đào là ngon nhất luôn ạ!',
      'có chấp nhận thanh toán momo không': '💸 Có ạ! Bên mình hỗ trợ thanh toán Momo, VNPay, tiền mặt.',
      'giá nước uống': '🥤 Nước ngọt 10k, trà tắc 12k, trà đào 15k. Mua combo còn rẻ hơn!',
      'bánh mì có phô mai không': '🧀 Có thể thêm phô mai (+5k), rất hợp với trứng chiên!',
      'đặt trước mấy phút': '⏰ Bạn nên đặt trước 15-20 phút để bên mình chuẩn bị nha.',
      'ship xa được không': '📦 Nếu trên 5km sẽ tính thêm phụ phí, bạn cho mình địa chỉ để kiểm tra nhé!',
      'bánh mì có dưa leo không': '🥒 Có ạ! Nếu bạn không thích có thể dặn bên mình bỏ ra.',
      'bánh mì không có pate được không': '🚫 Không pate được ạ! Mình sẽ thay bằng trứng/chả nếu bạn muốn.',
      'sáng có bán không': '🌅 Có bán từ 6h30 sáng mỗi ngày, bạn đặt trước sẽ được ưu tiên!',
      'trưa có giao không': '🍱 Trưa bên mình vẫn giao bình thường đến 13h30 nha!',
      'bánh mì có hành không': '🧅 Có, nhưng nếu bạn không ăn hành thì mình sẽ làm riêng.',
      'menu có gì': '📋 Menu có bánh mì, xôi, nước uống và vài món ăn vặt.',
      'ăn chay có gì': '🌱 Món chay gồm bánh mì chay, xôi đậu, và trà tắc thanh mát.',
      'bánh mì sốt tiêu đen': '🌶️ Bánh mì sốt tiêu đen cay nhẹ, thơm ngon – ăn là ghiền!',
      'có sốt mayonnaise không': '🥫 Có ạ! Sốt nhà làm, béo nhẹ, không ngấy.',
      'có đặt bánh mì qua zalo không': '📲 Có nhé! Bạn nhắn qua Zalo: 0935 370 171.',
      'mua tối đa bao nhiêu ổ': '📦 Mua tối đa 100 ổ/ngày nếu đặt trước ít nhất 1 ngày.',
      'có giao bánh mì cho công ty không': '🏢 Có giao tận văn phòng, hoá đơn rõ ràng, đóng gói chuyên nghiệp.',
      'bánh mì có ruốc không': '🐷 Có bánh mì ruốc bơ thơm béo – phù hợp cho bé và người lớn.',
      'combo cho 2 người': '🍽 Combo 2 ổ bánh mì + 2 nước = 65k, tiết kiệm hơn 15k!',
      'giá combo': '📊 Combo giá từ 35k đến 75k tuỳ món và nước kèm theo.',
      'bao lâu thì tới': '🕐 Thường 15-30 phút tùy vị trí. Giao càng gần càng nhanh!',
      'giao ban đêm không': '🌙 Tạm thời bên mình chưa giao ban đêm, mong bạn thông cảm!',
      'bánh mì có xúc xích không': '🌭 Có bánh mì xúc xích nướng kèm phô mai cực hấp dẫn!',
      'địa chỉ chi nhánh khác': '📍 Hiện chỉ có 1 chi nhánh tại 99 Tô Hiến Thành, Phước Mỹ, Sơn Trà, Đà Nẵng.',
      'bánh mì bơ tỏi': '🧄 Bánh mì bơ tỏi giòn tan, thơm nức – ăn vặt tuyệt vời!',
      'đặt bánh mì qua fanpage': '📘 Bạn có thể inbox fanpage để đặt hàng trực tiếp.',
      'bánh mì có chà bông không': '🐷 Có nhé! Bánh mì chà bông vừa béo vừa mặn mặn, ăn là ghiền!',
      'có nước ép không': '🍹 Hiện chưa có nước ép tươi, bạn có thể chọn trà đào hoặc nước suối nhé.',
      'bánh mì có nhân cá không': '🐟 Hiện chưa có nhân cá, bạn thử pate hoặc trứng cũng ngon lắm ạ!',
      'bánh mì ngọt sắp bán chưa': '🍯 Bánh mì ngọt sẽ ra mắt vào tháng tới, bạn nhớ theo dõi fanpage nha!',
      'giao đến trường học được không': '🏫 Có thể giao đến trường nếu bạn gửi chính xác tên và cổng trường.',
      'có nhận làm bánh mì sự kiện không': '🎉 Có nhận đơn bánh mì cho sự kiện, sinh nhật, họp nhóm trên 30 ổ.',
      'bánh mì nướng có không': '🔥 Bánh mì nướng pate phô mai sẽ ra mắt trong tuần tới!',
      'thanh toán trước được không': '💳 Có thể chuyển khoản hoặc Momo trước khi nhận bánh nhé.',
      'bánh mì cho bé': '🧒 Có bánh mì ít sốt, không cay, mềm phù hợp cho trẻ em.',
      'có bánh mì healthy không': '🥗 Sắp tới bên mình sẽ ra mắt dòng bánh mì ít dầu mỡ, bạn chờ nhé!',
      'số điện thoại đặt bánh mì': '📞 Hotline đặt hàng: 0935 370 171 (Zalo luôn nhé!).',
      'bánh mì bị nguội': '🥶 Xin lỗi bạn, bên mình sẽ đổi ngay ổ nóng nếu bánh mì nguội khi giao.',
      'phản hồi chậm do đâu': '📡 Vì giờ cao điểm nhiều tin nhắn, mong bạn kiên nhẫn giúp bên mình nhé!',
      'bánh mì giảm béo': '🏃 Hiện chưa có, nhưng bạn có thể yêu cầu ít sốt, ít nhân để giảm calo.',
      'có bán bữa tối không': '🍽 Hiện bên mình kết thúc lúc 18h, bạn đặt trước mình sẽ giữ phần nhé!',
    };

    // Tìm phản hồi chính xác (không phân biệt hoa thường)
    const userInput = text.toLowerCase();
    let foundResponse = null;

    for (const keyword in keywordResponses) {
      if (userInput.includes(keyword)) {
        foundResponse = keywordResponses[keyword];
        break;
      }
    }

    // Nếu có phản hồi cụ thể thì dùng, nếu không thì phản hồi ngẫu nhiên
    setTimeout(() => {
      if (foundResponse) {
        messages.push({ sender: 'app', text: foundResponse });
      } else {
        const responses = [
          '💬 Cảm ơn bạn! Chúng tôi sẽ phản hồi sớm.',
          '💬 Cảm ơn bạn đã liên hệ! Chúng tôi sẽ trả lời bạn ngay.',
          '💬 Chúng tôi đã nhận được yêu cầu của bạn và sẽ xử lý nhanh chóng.',
          '💬 Cảm ơn bạn đã gửi tin nhắn. Chúng tôi sẽ kiểm tra và phản hồi bạn.',
          '💬 Đang xử lý yêu cầu của bạn. Cảm ơn sự kiên nhẫn của bạn.',
          '💬 Đội ngũ của chúng tôi sẽ phản hồi bạn trong thời gian sớm nhất.',
          '💬 Cảm ơn bạn! Vui lòng đợi một chút chúng tôi sẽ phản hồi.',
          '💬 Bạn đã gửi yêu cầu thành công! Chúng tôi sẽ liên hệ lại sớm.',
          '💬 Yêu cầu của bạn đã được ghi nhận, chúng tôi sẽ phản hồi sớm.',
          '💬 Chúng tôi sẽ giải quyết yêu cầu của bạn ngay. Cảm ơn bạn!',
          '💬 Cảm ơn bạn! Đội ngũ của chúng tôi sẽ kiểm tra và liên lạc lại với bạn.',
          '💬 Chúng tôi đã nhận tin nhắn của bạn và đang xử lý.',
          '💬 Xin cảm ơn bạn đã liên hệ. Chúng tôi sẽ phản hồi bạn ngay.',
          '💬 Yêu cầu của bạn đã được tiếp nhận, vui lòng đợi chúng tôi phản hồi.',
          '💬 Cảm ơn bạn! Chúng tôi sẽ kiểm tra và phản hồi bạn nhanh chóng.',
          '💬 Đội ngũ của chúng tôi đang làm việc để giúp bạn. Cảm ơn sự kiên nhẫn của bạn.',
          '💬 Cảm ơn bạn đã nhắn tin! Chúng tôi sẽ phản hồi bạn ngay khi có thể.',
          '💬 Chúng tôi sẽ trả lời yêu cầu của bạn trong thời gian sớm nhất.',
          '💬 Cảm ơn bạn đã liên hệ với chúng tôi! Đội ngũ sẽ phản hồi bạn ngay.',
          '💬 Yêu cầu của bạn đang được xử lý. Cảm ơn sự kiên nhẫn của bạn.',
          '💬 Cảm ơn bạn! Chúng tôi sẽ kiểm tra và trả lời bạn ngay.',
          '💬 Tin nhắn của bạn đã được tiếp nhận. Cảm ơn bạn đã liên hệ.',
          '💬 Chúng tôi đã nhận yêu cầu và sẽ phản hồi bạn trong thời gian sớm nhất.',
          '💬 Cảm ơn bạn đã liên hệ! Phản hồi sẽ được gửi sớm.',
          '💬 Đội ngũ của chúng tôi sẽ kiểm tra và trả lời bạn trong thời gian ngắn.',
          '💬 Cảm ơn bạn đã gửi tin nhắn! Chúng tôi sẽ phản hồi bạn nhanh chóng.',
          '💬 Yêu cầu của bạn đã được tiếp nhận. Chúng tôi sẽ xử lý nhanh chóng.',
          '💬 Chúng tôi sẽ trả lời bạn trong thời gian sớm nhất, cảm ơn bạn.',
          '💬 Đội ngũ hỗ trợ của chúng tôi sẽ phản hồi bạn trong vài phút.',
          '💬 Cảm ơn bạn đã liên hệ! Chúng tôi sẽ trả lời bạn sớm nhất có thể.',
          '💬 Yêu cầu của bạn đã được ghi nhận, sẽ có phản hồi ngay lập tức.'
        ];
        const randomResponse = responses[Math.floor(Math.random() * responses.length)];
        messages.push({ sender: 'app', text: randomResponse });
      }
      renderMessages();
    }, 500);
  }


    // Toggle mở/đóng chat
    let isOpen = false;
    chatBubble.onclick = () => {
      isOpen = !isOpen;
      chatBox.classList.toggle('open', isOpen);
    };

    // Đóng chat khi click header
    chatHeader.onclick = () => {
      isOpen = false;
      chatBox.classList.remove('open');
    };

    sendBtn.onclick = sendMessage;

    messageInput.addEventListener('keypress', function (e) {
      if (e.key === 'Enter') sendMessage();
    });

    // Load lời chào ban đầu
    window.onload = () => {
      renderMessages();
    };
  </script>
</body>
</html>