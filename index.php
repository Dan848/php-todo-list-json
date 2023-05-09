<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP ToDo List JSON</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

</head>
<body class="bg-dark">
    <div id="app">
        <!-- PATTERN CONTAINER -->
        <div class="p-4 pt-5 pattern">   
            <!-- HEADER TITLE -->
            <header class="container d-flex justify-content-center mb-4 text-white">
                <h1 class="py-2 px-4 rounded-4">{{title}}</h1>
            </header>
            <!-- INPUT CONTAINER -->
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-auto mb-3">
                        <!-- INPUT BOX -->
                        <input class="bg-black text-white rounded-2 p-1" type="text" maxlength="30" placeholder="Insert Duck here..." v-model="addText" @keyup.enter="addItem">
                    </div>
                    <div class="col-auto mb-3">
                        <!-- ADD BUTTON -->
                        <button class="btn quack add text-white fw-medium" @click="addItem">{{addButton}}<img class="duck-ico ms-2" src="./img/icon-duck.svg" alt="duck-ico"></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- LIST CONTAINER -->
        <div class="container mt-4">
            <div class="row justify-content-center">
                <!-- TO DO LIST START -->
                <ul v-if="toDoList.length > 0 && !toDoList.every((item) => item.done === true)" class="list-unstyled col-12 col-sm-10 col-md-8 rounded-4 py-1 px-2">
                    <!-- TO DO Item List -->
                    <li :class="'d-flex justify-content-between p-2 rounded-2 my-3' + ' '+ (item.done ? 'd-none' : 'bg-warning')" v-for="(item, index) in toDoList">
                        <!-- TO DO Text Item -->
                        <div :class="'text-capitalize d-flex align-items-center w-100 p-2 rounded-2 fw-medium me-3' + ' '+ (item.done ? 'bg-success-subtle' : 'bg-warning-subtle')">
                            {{item.text}}
                        </div>
                        <!-- TO DO BUTTON CONTAINER -->
                        <div class="d-flex flex-sm-row flex-column">
                            <!-- Done -->
                            <button class="btn quack confirm me-sm-3 mb-2 mb-sm-0" @click="doneItem(index)"><img class="duck-ico" src="./img/icon-duck.svg" alt=""></button>
                            <!-- Remove -->
                            <button class="btn quack remove" @click="removeItem(index)"><img class="duck-ico" src="./img/icon-duck-cross.png" alt=""></button>
                        </div>
                    </li>
                </ul>

                <!-- EMPTY MESSAGE -->
                <h3 v-show="toDoList.length <= 0" class="bg-danger text-center rounded-2 p-2 text-black">Empty</h3>

                <!-- DONE LIST TITLE -->
                <div v-if="toDoList.length > 0 && !toDoList.every((item) => item.done === '')" class="w-100 d-flex justify-content-center align-items-center mb-0"><h2 class="text-white py-2 px-4 rounded-top-4">{{doneListTitle}}</h2></div>

                <!-- DONE LIST START -->
                <ul v-show="toDoList.length > 0 && !toDoList.every((item) => item.done === '')" class="list-unstyled col-12 col-sm-10 col-md-8 rounded-4 py-1 px-2 mt-0">
                    <!-- DONE Item List -->
                    <li :class="'d-flex justify-content-between p-2 rounded-2 my-3' + ' '+ (item.done ? 'new-green' : 'd-none')" v-for="(item, index) in toDoList">
                        <!-- Done Text Item -->
                        <div :class="'text-capitalize d-flex align-items-center w-100 p-2 rounded-2 fw-medium me-3' + ' '+ (item.done ? 'bg-success-subtle text-decoration-line-through' : 'bg-warning-subtle')">
                            {{item.text}}
                        </div>
                        <!-- DONE BUTTON CONTAINER -->
                        <div class="d-flex flex-sm-row flex-column">
                            <!-- Done -->
                            <button class="btn quack confirm me-sm-3 mb-2 mb-sm-0" @click="doneItem(index)"><img class="duck-ico" src="./img/icon-duck.svg" alt=""></button>
                            <!-- Remove -->
                            <button class="btn quack remove" @click="removeItem(index)"><img class="duck-ico" src="./img/icon-duck-cross.png" alt=""></button>
                        </div>
                    </li>
                </ul>

            </div>

        </div>
    </div>
<script src="./js/script.js"></script>
</body>
</html>