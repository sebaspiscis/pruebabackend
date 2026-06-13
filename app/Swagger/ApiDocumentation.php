<?php

namespace App\Swagger;

use OpenApi\Attributes as OA;

// ==================== CATEGORÍAS ====================

#[OA\Get(
    path: '/api/categorias',
    summary: 'Listar todas las categorías',
    tags: ['Categorías'],
    responses: [
        new OA\Response(
            response: 200,
            description: 'Lista de categorías',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: 'success', type: 'boolean', example: true),
                    new OA\Property(property: 'data', type: 'array', items: new OA\Items(
                        properties: [
                            new OA\Property(property: 'id', type: 'string', format: 'uuid'),
                            new OA\Property(property: 'nombre', type: 'string', example: 'Electrónica'),
                        ]
                    ))
                ]
            )
        ),
        new OA\Response(response: 500, description: 'Error interno')
    ]
)]
#[OA\Post(
    path: '/api/categorias',
    summary: 'Crear una categoría',
    tags: ['Categorías'],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: ['nombre'],
            properties: [
                new OA\Property(property: 'nombre', type: 'string', maxLength: 150, example: 'Electrónica'),
            ]
        )
    ),
    responses: [
        new OA\Response(response: 201, description: 'Categoría creada correctamente'),
        new OA\Response(response: 500, description: 'Error interno')
    ]
)]
#[OA\Get(
    path: '/api/categorias/{id}',
    summary: 'Obtener una categoría',
    tags: ['Categorías'],
    parameters: [
        new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'string', format: 'uuid'))
    ],
    responses: [
        new OA\Response(response: 200, description: 'Categoría encontrada'),
        new OA\Response(response: 404, description: 'Categoría no encontrada')
    ]
)]
#[OA\Put(
    path: '/api/categorias/{id}',
    summary: 'Actualizar una categoría',
    tags: ['Categorías'],
    parameters: [
        new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'string', format: 'uuid'))
    ],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: ['nombre'],
            properties: [
                new OA\Property(property: 'nombre', type: 'string', maxLength: 150, example: 'Electrónica'),
            ]
        )
    ),
    responses: [
        new OA\Response(response: 200, description: 'Categoría actualizada'),
        new OA\Response(response: 500, description: 'Error interno')
    ]
)]
#[OA\Delete(
    path: '/api/categorias/{id}',
    summary: 'Eliminar una categoría',
    tags: ['Categorías'],
    parameters: [
        new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'string', format: 'uuid'))
    ],
    responses: [
        new OA\Response(response: 200, description: 'Categoría eliminada'),
        new OA\Response(response: 500, description: 'Error interno')
    ]
)]

// ==================== PRODUCTOS ====================

#[OA\Get(
    path: '/api/productos',
    summary: 'Listar todos los productos',
    tags: ['Productos'],
    responses: [
        new OA\Response(
            response: 200,
            description: 'Lista de productos',
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: 'success', type: 'boolean', example: true),
                    new OA\Property(property: 'data', type: 'array', items: new OA\Items(
                        properties: [
                            new OA\Property(property: 'id', type: 'string', format: 'uuid'),
                            new OA\Property(property: 'name', type: 'string', example: 'Laptop'),
                            new OA\Property(property: 'description', type: 'string', example: 'Laptop gamer'),
                            new OA\Property(property: 'price', type: 'number', example: 999.99),
                            new OA\Property(property: 'stock', type: 'integer', example: 10),
                            new OA\Property(property: 'categoria_id', type: 'string', format: 'uuid'),
                        ]
                    ))
                ]
            )
        ),
        new OA\Response(response: 500, description: 'Error interno')
    ]
)]
#[OA\Post(
    path: '/api/productos',
    summary: 'Crear un producto',
    tags: ['Productos'],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: ['name', 'description', 'price', 'stock', 'categoria_id'],
            properties: [
                new OA\Property(property: 'name', type: 'string', maxLength: 50, example: 'Laptop'),
                new OA\Property(property: 'description', type: 'string', maxLength: 250, example: 'Laptop gamer'),
                new OA\Property(property: 'price', type: 'number', example: 999.99),
                new OA\Property(property: 'stock', type: 'integer', example: 10),
                new OA\Property(property: 'categoria_id', type: 'string', format: 'uuid', example: 'uuid-de-la-categoria'),
            ]
        )
    ),
    responses: [
        new OA\Response(response: 201, description: 'Producto creado correctamente'),
        new OA\Response(response: 500, description: 'Error interno')
    ]
)]
#[OA\Get(
    path: '/api/productos/{id}',
    summary: 'Obtener un producto',
    tags: ['Productos'],
    parameters: [
        new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'string', format: 'uuid'))
    ],
    responses: [
        new OA\Response(response: 200, description: 'Producto encontrado'),
        new OA\Response(response: 404, description: 'Producto no encontrado')
    ]
)]
#[OA\Put(
    path: '/api/productos/{id}',
    summary: 'Actualizar un producto',
    tags: ['Productos'],
    parameters: [
        new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'string', format: 'uuid'))
    ],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: ['name', 'description', 'price', 'stock', 'categoria_id'],
            properties: [
                new OA\Property(property: 'name', type: 'string', maxLength: 50, example: 'Laptop'),
                new OA\Property(property: 'description', type: 'string', maxLength: 250, example: 'Laptop gamer'),
                new OA\Property(property: 'price', type: 'number', example: 999.99),
                new OA\Property(property: 'stock', type: 'integer', example: 10),
                new OA\Property(property: 'categoria_id', type: 'string', format: 'uuid', example: 'uuid-de-la-categoria'),
            ]
        )
    ),
    responses: [
        new OA\Response(response: 200, description: 'Producto actualizado'),
        new OA\Response(response: 500, description: 'Error interno')
    ]
)]
#[OA\Delete(
    path: '/api/productos/{id}',
    summary: 'Eliminar un producto',
    tags: ['Productos'],
    parameters: [
        new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'string', format: 'uuid'))
    ],
    responses: [
        new OA\Response(response: 200, description: 'Producto eliminado'),
        new OA\Response(response: 500, description: 'Error interno')
    ]
)]

// ==================== AUTH ====================

#[OA\Post(
    path: '/api/login',
    summary: 'Iniciar sesión',
    tags: ['Auth'],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: ['email', 'password'],
            properties: [
                new OA\Property(property: 'email', type: 'string', format: 'email', example: 'admin@overskull.com'),
                new OA\Property(property: 'password', type: 'string', example: '123456789'),
            ]
        )
    ),
    responses: [
        new OA\Response(response: 200, description: 'Login exitoso'),
        new OA\Response(response: 401, description: 'Credenciales incorrectas')
    ]
)]
#[OA\Post(
    path: '/api/logout',
    summary: 'Cerrar sesión',
    tags: ['Auth'],
    responses: [
        new OA\Response(response: 200, description: 'Sesión cerrada'),
        new OA\Response(response: 401, description: 'No autorizado')
    ]
)]
class ApiDocumentation {}