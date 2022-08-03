# Javan PHP Assessment 1

Laravel web app and API for PHP Assessment 1 at PT. Javan Cipta Solusi

## Usage

Install Laravel dependencies.

```bash
composer install
```

Copy .env file.

```bash
composer run-script post-root-package-instal
```

Generate encryption key.

```bash
php artisan key:generate
```

Migrate database.

```bash
php artisan migrate
```

Seed database.

```bash
php artisan db:seed
```

Install node.js dependencies.

```bash
npm install
```

Build assets for production.

```bash
npm run build
```

Serve Laravel.

```bash
php artisan serve
```

Open the app on your browser at <http://127.0.0.1:8000>

----

## **API USAGE**

----

### **Family Tree**

  Returns family tree.

* **URL**

  <http://localhost:8000/api/family-member>

* **Method:**

  `GET`
  
* **URL Params**

    `query=[string]` (Optional)\
    `gender=[m|f]` (Optional)

* **Data Params**

   **Required:**

   None

* **Success Response:**

  * **Code:** 200 OK\
    **Content:** `{
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "parent_id": null,
                "name": "Budi",
                "gender": "m",
                "offsprings": [
                    {
                        "id": 2,
                        "parent_id": 1,
                        "name": "Dedi",
                        "gender": "m",
                        "children": [
                            {
                                "id": 6,
                                "parent_id": 2,
                                "name": "Feri",
                                "gender": "m"
                            },
                            {
                                "id": 7,
                                "parent_id": 2,
                                "name": "Farah",
                                "gender": "f"
                            }
                        ]
                    },
                    {
                        "id": 3,
                        "parent_id": 1,
                        "name": "Dodi",
                        "gender": "m",
                        "children": [
                            {
                                "id": 8,
                                "parent_id": 3,
                                "name": "Gugus",
                                "gender": "m"
                            },
                            {
                                "id": 9,
                                "parent_id": 3,
                                "name": "Gandi",
                                "gender": "m"
                            }
                        ]
                    },
                    {
                        "id": 4,
                        "parent_id": 1,
                        "name": "Dede",
                        "gender": "m",
                        "children": [
                            {
                                "id": 10,
                                "parent_id": 4,
                                "name": "Hani",
                                "gender": "f"
                            },
                            {
                                "id": 11,
                                "parent_id": 4,
                                "name": "Hana",
                                "gender": "f"
                            }
                        ]
                    },
                    {
                        "id": 5,
                        "parent_id": 1,
                        "name": "Dewi",
                        "gender": "f",
                        "children": []
                    }
                ]
            }
        ],
        "first_page_url": "http://localhost:8000/api/family-member?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://localhost:8000/api/family-member?page=1",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://localhost:8000/api/family-member?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "next_page_url": null,
        "path": "http://localhost:8000/api/family-member",
        "per_page": 10,
        "prev_page_url": null,
        "to": 1,
        "total": 1
    },
    "messages": [
        "Success"
    ],
    "error": false
}`

* **Sample Call:**

  ```javascript
    $.ajax({
      url: "http://localhost:8000/api/family-member",
      dataType: "json",
      type : "GET",
      success : function(r) {
        console.log(r);
      }
    });
  ```

---

### **Children of Budi**

  Returns children of Budi.

* **URL**

  <http://localhost:8000/api/family-member/1/children>

* **Method:**

  `GET`
  
* **URL Params**

    `query=[string]` (Optional)\
    `gender=[m|f]` (Optional)

* **Data Params**

   **Required:**

   None

* **Success Response:**

  * **Code:** 200 OK\
    **Content:** `{
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 2,
                "parent_id": 1,
                "name": "Dedi",
                "gender": "m"
            },
            {
                "id": 3,
                "parent_id": 1,
                "name": "Dodi",
                "gender": "m"
            },
            {
                "id": 4,
                "parent_id": 1,
                "name": "Dede",
                "gender": "m"
            },
            {
                "id": 5,
                "parent_id": 1,
                "name": "Dewi",
                "gender": "f"
            }
        ],
        "first_page_url": "http://localhost:8000/api/family-member/1/children?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://localhost:8000/api/family-member/1/children?page=1",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://localhost:8000/api/family-member/1/children?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "next_page_url": null,
        "path": "http://localhost:8000/api/family-member/1/children",
        "per_page": 10,
        "prev_page_url": null,
        "to": 4,
        "total": 4
    },
    "messages": [
        "Success"
    ],
    "error": false
}`

* **Sample Call:**

  ```javascript
    $.ajax({
      url: "http://localhost:8000/api/family-member/1/children",
      dataType: "json",
      type : "GET",
      success : function(r) {
        console.log(r);
      }
    });
  ```

---

### **Grand Children of Budi**

  Returns grand children of Budi.

* **URL**

  <http://localhost:8000/api/family-member/1/grand-children>

* **Method:**

  `GET`
  
* **URL Params**

    `query=[string]` (Optional)\
    `gender=[m|f]` (Optional)

* **Data Params**

   **Required:**

   None

* **Success Response:**

  * **Code:** 200 OK\
    **Content:** `{
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 6,
                "parent_id": 2,
                "name": "Feri",
                "gender": "m"
            },
            {
                "id": 7,
                "parent_id": 2,
                "name": "Farah",
                "gender": "f"
            },
            {
                "id": 8,
                "parent_id": 3,
                "name": "Gugus",
                "gender": "m"
            },
            {
                "id": 9,
                "parent_id": 3,
                "name": "Gandi",
                "gender": "m"
            },
            {
                "id": 10,
                "parent_id": 4,
                "name": "Hani",
                "gender": "f"
            },
            {
                "id": 11,
                "parent_id": 4,
                "name": "Hana",
                "gender": "f"
            }
        ],
        "first_page_url": "http://localhost:8000/api/family-member/1/grand-children?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://localhost:8000/api/family-member/1/grand-children?page=1",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://localhost:8000/api/family-member/1/grand-children?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "next_page_url": null,
        "path": "http://localhost:8000/api/family-member/1/grand-children",
        "per_page": 10,
        "prev_page_url": null,
        "to": 6,
        "total": 6
    },
    "messages": [
        "Success"
    ],
    "error": false
}`

* **Sample Call:**

  ```javascript
    $.ajax({
      url: "http://localhost:8000/api/family-member/1/grand-children",
      dataType: "json",
      type : "GET",
      success : function(r) {
        console.log(r);
      }
    });
  ```

---

### **Grand Daughters of Budi**

  Returns grand daughters of Budi.

* **URL**

  <http://localhost:8000/api/family-member/1/grand-children?gender=f>

* **Method:**

  `GET`
  
* **URL Params**

    `query=[string]` (Optional)

* **Data Params**

   **Required:**

   None

* **Success Response:**

  * **Code:** 200 OK\
    **Content:** `{
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 7,
                "parent_id": 2,
                "name": "Farah",
                "gender": "f"
            },
            {
                "id": 10,
                "parent_id": 4,
                "name": "Hani",
                "gender": "f"
            },
            {
                "id": 11,
                "parent_id": 4,
                "name": "Hana",
                "gender": "f"
            }
        ],
        "first_page_url": "http://localhost:8000/api/family-member/1/grand-children?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://localhost:8000/api/family-member/1/grand-children?page=1",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://localhost:8000/api/family-member/1/grand-children?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "next_page_url": null,
        "path": "http://localhost:8000/api/family-member/1/grand-children",
        "per_page": 10,
        "prev_page_url": null,
        "to": 3,
        "total": 3
    },
    "messages": [
        "Success"
    ],
    "error": false
}`

* **Sample Call:**

  ```javascript
    $.ajax({
      url: "http://localhost:8000/api/family-member/1/grand-children",
      data: { 
        gender: 'f', 
      },
      dataType: "json",
      type : "GET",
      success : function(r) {
        console.log(r);
      }
    });
  ```

---

### **Aunts of Farah**

  Returns aunts of Farah.

* **URL**

  <http://localhost:8000/api/family-member/7/parent-siblings?gender=f>

* **Method:**

  `GET`
  
* **URL Params**

    `query=[string]` (Optional)

* **Data Params**

   **Required:**

   None

* **Success Response:**

  * **Code:** 200 OK\
    **Content:** `{
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 5,
                "parent_id": 1,
                "name": "Dewi",
                "gender": "f"
            }
        ],
        "first_page_url": "http://localhost:8000/api/family-member/7/parent-siblings?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://localhost:8000/api/family-member/7/parent-siblings?page=1",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://localhost:8000/api/family-member/7/parent-siblings?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "next_page_url": null,
        "path": "http://localhost:8000/api/family-member/7/parent-siblings",
        "per_page": 10,
        "prev_page_url": null,
        "to": 1,
        "total": 1
    },
    "messages": [
        "Success"
    ],
    "error": false
}`

* **Sample Call:**

  ```javascript
    $.ajax({
      url: "http://localhost:8000/api/family-member/7/parent-siblings",
      data: { 
        gender: 'f', 
      },
      dataType: "json",
      type : "GET",
      success : function(r) {
        console.log(r);
      }
    });
  ```

---

### **Male cousins of Hani**

  Returns male cousins of Hani.

* **URL**

  <http://localhost:8000/api/family-member/10/cousins?gender=m>

* **Method:**

  `GET`
  
* **URL Params**

    `query=[string]` (Optional)

* **Data Params**

   **Required:**

   None

* **Success Response:**

  * **Code:** 200 OK\
    **Content:** `{
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 6,
                "parent_id": 2,
                "name": "Feri",
                "gender": "m"
            },
            {
                "id": 8,
                "parent_id": 3,
                "name": "Gugus",
                "gender": "m"
            },
            {
                "id": 9,
                "parent_id": 3,
                "name": "Gandi",
                "gender": "m"
            }
        ],
        "first_page_url": "http://localhost:8000/api/family-member/10/cousins?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://localhost:8000/api/family-member/10/cousins?page=1",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://localhost:8000/api/family-member/10/cousins?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "next_page_url": null,
        "path": "http://localhost:8000/api/family-member/10/cousins",
        "per_page": 10,
        "prev_page_url": null,
        "to": 3,
        "total": 3
    },
    "messages": [
        "Success"
    ],
    "error": false
}`

* **Sample Call:**

  ```javascript
    $.ajax({
      url: "http://localhost:8000/api/family-member/10/cousins",
      data: { 
        gender: 'm', 
      },
      dataType: "json",
      type : "GET",
      success : function(r) {
        console.log(r);
      }
    });
  ```
