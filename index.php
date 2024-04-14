<?php 
require_once 'layout/header.php';
$title = 'Amelie Rolland';
?>

    <header class="h-screen backgroundimg">

        <div class="h-full flex items-center justify-center">
            <h1 class="text-white text-8xl font-black">AMELIE ROLLAND</h1>
        </div>

    </header>

    <section class="'a-propos">
        <div class="container mx-auto">

            <div class="container mx-auto -mt-24 bg-white">
                <div class="columns-2 pink mb-20 p-28">

                    <div class="px-12">
                        <img class="h-full" src="assets/img/me.png" alt="">
                    </div>

                    <div class="px-8">
                        <h2 class="text-4xl font-extrabold pb-20">A propos</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate aliquam omnis, praesentium ipsa pariatur, vitae maxime rerum vero, amet odit provident tenetur labore sint sunt quaerat ut asperiores quam ullam! <br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro libero reiciendis numquam recusandae odio a autem, unde vitae, qui, optio corporis. Eaque ad doloribus numquam aut distinctio autem, vitae illo. <br> 
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, nihil. Quis quisquam deleniti iste tempore ipsa animi aut ad at harum. Velit vel dolore unde reprehenderit consectetur rem rerum libero.</p>
                        <a href="">Lire +</a>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section class="mb-32">

        <div class="container mx-auto">

            <h2 class="text-4xl font-extrabold py-20">Portraits</h2>

            <div class="columns-5 gap-8">
                <div class="border">
                    <img src="assets/img/alain-brigitte.png" alt="">
                </div>
                <div class="border">
                    <img src="assets/img/autoportrait.png" alt="">
                </div>
                <div class="border">
                    <img src="assets/img/cyriel.png" alt="">
                </div>
                <div class="border">
                    <img src="assets/img/mia.png" alt="">
                </div>
                <div class="border">
                    <img src="assets/img/adams.png" alt="">
                </div>
            </div>

            <div class="w-2/3 pt-16">

                <p class="text-lg pb-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut voluptas laborum culpa id repudiandae non sit ex perspiciatis velit rem enim, praesentium voluptatum nobis commodi maxime soluta vitae obcaecati! Molestiae?
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Error fuga rem cupiditate tempora vero ut illum ratione ad sapiente temporibus, voluptates suscipit sint vitae dolor nisi maiores odio enim consequatur?</p>

                <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-200 via-red-300 to-yellow-200 group-hover:from-red-200 group-hover:via-red-300 group-hover:to-yellow-200 dark:text-gray-900 dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400">
                    <span class="relative px-8 py-3.5 transition-all ease-in duration-75 bg-white dark:white rounded-md group-hover:bg-opacity-0">
                        <a class="text-lg" href="galerie-portrait.php">Voir la galerie</a>
                    </span>
                </button>
            
            </div>

        </div>

    </section>

    <section id="galerie2" class="pink">

        <div class="container flex items-center mx-auto">

            <div class="flex-col columns-2 h-full ">

                <div class="flex justify-end z-0 h-100">
                    <img class="py-20" src="assets/img/betty1.png" alt="">
                </div>

                <div class=" flex flex-col justify-items-center h-100 pt-32">

                    <div class="dark-pink p-20 -ms-28 z-10">
                        <h2 class="text-4xl font-extrabold pb-20">Galerie 2</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit iure sequi eum numquam? Quo possimus incidunt similique fuga molestiae, alias impedit illum ea accusamus eius quibusdam? Quas deleniti quis quos? <br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste placeat ad reprehenderit pariatur laudantium delectus mollitia aut voluptates doloremque! Consequatur excepturi ut porro ullam magni eius pariatur, placeat ab. Accusantium.</p>
                    </div>

                </div>

            </div>
        </div>
    </section>

<!-- FORMULAIRE DE CONTACT -->

    <section class="darker-pink">

  <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
      <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Contact Us</h2>
      <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">Une question ? Un projet ? Ecrivez-moi</p>

      <form method="post" action="contact-process.php" class="space-y-8">

            <div class="mb-5">
                <label for="name"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your name</label>
                <input type="name" id="name" name="firstname" class="bg-red-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-red-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="your name" required />
            </div>

            <div class="mb-5">
                <label for="name"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your name</label>
                <input type="name" id="name" name="lastname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-red-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="your name" required />
            </div>

          <div>
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your email</label>
              <input type="email" name="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-red-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="name@flowbite.com" required>
          </div>

          <div>
              <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject</label>
              <input type="text" name="subject" id="subject" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-red-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Let us know how we can help you" required>
          </div>

          <div class="sm:col-span-2">
              <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your message</label>

              <textarea type="text" name="message" id="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-red-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Leave a comment..."></textarea>
          </div>

          <input type="submit" name="envoyer" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
      </form>
  </div>
</section>
<?php require_once 'layout/footer.php';  ?>