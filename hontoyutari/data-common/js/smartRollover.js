//���o�C���f�o�C�X�̔���BPC�Ȃ烍�[���I�[�o�[�p�R�[�h���A�N�e�B�u�ɂ���
if ((navigator.userAgent.indexOf('iPhone') > 0 && navigator.userAgent.indexOf('iPad') > 0) || (navigator.userAgent.indexOf('Android') > 0 && navigator.userAgent.indexOf('Mobile') == -1 )||(navigator.userAgent.indexOf('Android') == -1 && navigator.userAgent.indexOf('iPhone') == -1 )) {
  var rollover = function() {
    if(document.getElementsByTagName) {
      var img = document.getElementsByTagName('img');
      //�摜���v�����[�h����ۂɃC���[�W�I�u�W�F�N�g��˂����ނ��߂̔z��
      var preImg = [];
      for (var i=-1,j=-1,n=img.length; ++i < n;) {
        //�t�@�C�����Ɂu_off.�v������ꍇ�Ƀv�����[�h�摜��z��ɓ˂����񂾂胍�[���I�[�o�[���������s
        if (img[i].getAttribute('src').match(/_off\./)) {
          //�z��ɃC���[�W�I�u�W�F�N�g���쐬
          preImg[++j] = new Image();
          //�C���[�W�I�u�W�F�N�g��src�����̒l��ݒ肵�ĉ摜���v�����[�h
          preImg[j].src = img[i].getAttribute("src").replace("_off.", "_on.");
          img[i].onmouseover = function() {
            this.setAttribute('src', this.getAttribute('src').replace('_off.', '_on.'));
	      $("body a:hover").css('opacity', '1');
          };
          img[i].onmouseout = function() {
            this.setAttribute('src', this.getAttribute('src').replace('_on.', '_off.'));
          };
        }
      }
    }
  };
  if(window.addEventListener) {
    window.addEventListener("load", rollover, false);
  }
  else if(window.attachEvent) {
    window.attachEvent("onload", rollover);
  }
}
