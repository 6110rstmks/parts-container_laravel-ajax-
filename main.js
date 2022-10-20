checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', () => {
        checkbox.parentNode.submit();
    });
});

// checkbox 

/*upto*/
uptos.forEach(upto => {
    const postid = upto.dataset.id;
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    upto.addEventListener('click', () => {

        fetch('/posts/'+ postid + '/upto', {
            method: 'PATCH',
            headers: {
                'X-CSRF-Token': token,
            }
        });

        const preTarget = upto.parentNode.parentNode.previousElementSibling;
        const moveTarget = upto.parentNode.parentNode;

        if (moveTarget !== ul.children[0]) {
          ul.insertBefore(moveTarget, preTarget);
        }
    })
});

/// ajax downto
downtos.forEach(downto => {
    const postid = downto.dataset.id;
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    downto.addEventListener('click', () => {

        fetch('/posts/'+ postid + '/downto', {
            method: 'PATCH',
            headers: {
                'X-CSRF-Token': token,
            }
        });

        const postTarget = downto.parentNode.parentNode.nextElementSibling;
        const moveTarget = downto.parentNode.parentNode;

        if (moveTarget !== ul.lastElementChild) {
          ul.insertBefore(postTarget, moveTarget);
        }
    })
});
