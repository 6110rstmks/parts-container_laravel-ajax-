checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', () => {
        checkbox.parentNode.submit();
    });
});

// checkbox 
