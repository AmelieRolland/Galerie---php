<?php

require_once __DIR__ . '/../layout/side-bar.php';
require_once __DIR__ . '/../functions/db.php';
require_once __DIR__ . '/../data/contact-request.php';

?>



<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="ms-80 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Expediteur
                </th>
                <th scope="col" class="px-6 py-3">
                    Objet
                </th>
                <th scope="col" class="px-6 py-3">
                    Date
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">action</span>
                </th>
            </tr>
        </thead>
        <tbody>

        <?php
        foreach($contactRequests as $contactRequest) {
        ?>
    
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?php echo $contactRequest['firstname'] . " " . $contactRequest['lastname'] ?>
                </th>
                <td class="px-6 py-4">

                <?php echo $contactRequest['subject'] ?>

                </td>
                <td class="px-6 py-4">
                <?php echo $contactRequest['date'] ?>

                </td>
                <td class="px-6 py-4 text-right">
                    <a href="message.php?id=<?php echo $contactRequest['id'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Voir</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


</body>
