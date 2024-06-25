// 获取所有按钮和复制描述
const buttons = document.querySelectorAll('.btn');
const copyDescription = document.getElementById('copy-description');

// 绑定鼠标移动事件
buttons.forEach(button => {
	button.addEventListener('mouseover', () => {
		// 创建一个临时输入框
		const tempInput = document.createElement('input');
		// 设置输入框的值为链接
		tempInput.value = button.dataset.url;
		// 将输入框添加到页面中
		document.body.appendChild(tempInput);
		// 选中输入框中的内容
		tempInput.select();
		// 复制选中的内容到剪贴板
		document.execCommand('copy');
		// 移除输入框
		document.body.removeChild(tempInput);
		// 更新复制描述
		copyDescription.innerHTML = `${button.textContent}链接已复制到剪贴板，链接：<code>${button.dataset.url}</code>`;
	});
});
