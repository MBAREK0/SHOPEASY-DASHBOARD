const sidebar = document.querySelector(".side")
const opens = document.querySelector('.open')
 console.log(opens);
const closes = document.querySelector('.close')
opens.addEventListener('click', () => {
    sidebar.classList.toggle('menu')
})
closes.addEventListener('click', () => {
   
    sidebar.classList.remove('menu')
})

 $(document).ready(function () {
            // Sélectionnez tous les éléments de la classe sidebar_item
            var sidebarItems = $(".sidebar_item");

            // Ajoutez un gestionnaire d'événements de clic à chaque élément
            sidebarItems.click(function () {
                // Supprimez la classe active de tous les éléments
                sidebarItems.removeClass("active");

                // Ajoutez la classe active à l'élément cliqué
                $(this).addClass("active");
            });
        });

