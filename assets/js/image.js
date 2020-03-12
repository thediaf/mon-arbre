var links = document.querySelectorAll('.linkPict'),
            linksLen = links.length;

        for (var i = 0 ; i < linksLen ; i++) {


            links[i].onclick = function() { // J'utilise le DOM-0, mais vous pouvez très bien utiliser le DOM-2 !
                displayImg(this);           // On appelle notre fonction pour afficher les images
                return false;               // Et on bloque la redirection
            };
        
        }

        function displayImg(link) {

            var img = new Image(),
                overlay = document.getElementById('overlay');

            img.onload = function() {
                overlay.innerHTML = '';
                overlay.appendChild(img);
            };

            img.src = link.href;
            overlay.style.display = 'block';
            overlay.innerHTML = '<span>Chargement en cours...</span>';

        }

        $("#overlay").click(function() {
            this.style.display = 'none';
        });

        // document.getElementById('overlay').onclick = function() {
        //     this.style.display = 'none';
        // };