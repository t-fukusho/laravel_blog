const containers = document.querySelectorAll('.Container');
    const scrollAmount = 200; // ３回で最大値まで行く程度の数値

    containers.forEach(container => {
        const boxContainer = container.querySelector('.Box-Container');
        const leftArrow = container.querySelector('.Arrow.left');
        const rightArrow = container.querySelector('.Arrow.right');

        leftArrow.addEventListener('click', () => {
            const containerWidth = container.offsetWidth;
            const maxScrollAmount = boxContainer.offsetWidth - containerWidth;
            const currentScrollAmount = Math.abs(parseInt(boxContainer.style.transform.split('(')[1])) || 0;
            const newScrollAmount = Math.max(currentScrollAmount - scrollAmount, 0);
            boxContainer.style.transform = `translateX(-${newScrollAmount}px)`;
            updateArrowVisibility(leftArrow, rightArrow, newScrollAmount, maxScrollAmount);
        });

        rightArrow.addEventListener('click', () => {
            const containerWidth = container.offsetWidth;
            const maxScrollAmount = boxContainer.offsetWidth - containerWidth;
            const currentScrollAmount = Math.abs(parseInt(boxContainer.style.transform.split('(')[1])) || 0;
            const newScrollAmount = Math.min(currentScrollAmount + scrollAmount, maxScrollAmount);
            boxContainer.style.transform = `translateX(-${newScrollAmount}px)`;
            updateArrowVisibility(leftArrow, rightArrow, newScrollAmount, maxScrollAmount);
        });
    });

    function updateArrowVisibility(leftArrow, rightArrow, scrollAmount, maxScrollAmount) {
        if (scrollAmount === 0) {
            leftArrow.classList.add('Hide');
        } else {
            leftArrow.classList.remove('Hide');
        }

        if (scrollAmount === maxScrollAmount) {
            rightArrow.classList.add('Hide');
        } else {
            rightArrow.classList.remove('Hide');
        }
    }
