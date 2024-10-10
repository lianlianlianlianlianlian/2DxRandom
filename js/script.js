
const buttons = document.querySelectorAll('.btn');
const copyDescription = document.getElementById('copy-description');

buttons.forEach(button => {
	button.addEventListener('mouseover', () => {
		const tempInput = document.createElement('input');

		tempInput.value = button.dataset.url;

		document.body.appendChild(tempInput);

		tempInput.select();

		document.execCommand('copy');

		document.body.removeChild(tempInput);

		copyDescription.innerHTML = `${button.textContent}链接已复制到剪贴板，链接：<code>${button.dataset.url}</code>`;
	});
});




document.addEventListener('DOMContentLoaded', function() {
  const img = new Image();
  img.src = 'https://img.darklotus.cn/random';
  img.onload = function() {
    document.body.style.backgroundImage = `url('${img.src}')`;
    document.body.classList.add('loaded'); // 添加 loaded 类
  };
});