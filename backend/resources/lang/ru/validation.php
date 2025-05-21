<?php

return [
    'required' => 'Поле :attribute обязательно для заполнения.',
    'string' => 'Поле :attribute должно быть строкой.',
    'max' => [
        'string' => 'Поле :attribute не должно превышать :max символов.',
    ],
    'min' => [
        'string' => 'Поле :attribute должно быть не менее :min символов.',
    ],
    'numeric' => 'Поле :attribute должно быть числом.',
    'between' => [
        'numeric' => 'Поле :attribute должно быть между :min и :max.',
    ],
    'unique' => 'Такое значение поля :attribute уже существует.',
    'exists' => 'Выбранное значение для :attribute некорректно.',

    'attributes' => [
        'name' => 'название места',
        'login' => 'логин',
        'password' => 'пароль',
        'latitude' => 'широта',
        'longitude' => 'долгота',
        'place_id' => 'ID места',
    ],
];
