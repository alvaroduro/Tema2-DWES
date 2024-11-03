<!--Footer-->
<p class="bg-primary-subtle w-100 text-center">Alvaro Duran Amador - Derechos reservados &copy; <span id="year"></span></p>

<script>
        function agregarAño() {
            const yearElement = document.getElementById("year");
            const currentYear = new Date().getFullYear(); // Obtiene el año actual
            yearElement.textContent = currentYear; // Asigna el año al elemento
        }

        // Llama a la función al cargar la página
        agregarAño();
    </script>