## Mikhail Buryak ##
=================
### [ITRex](http://itrexgroup.com/) Code Demonstration ###

### [Description of the test task](http://tasks.php.itrexgroup.com/php/junior.html) #1 [solution](app/Http/Controllers/PictureController.php)

Please, create a web-page containing a picture gallery (the list of photographs) and an interface for uploading the pictures to the gallery.
The requirements are as following:

* The system should provide the users with the possibility to view the pictures and the text description of the pictures;
* The pictures should be displayed on separate pages (12 pictures per page);
* The sorting by default is LIFO;
* Miniatures of the pictures for the gallery should be formed automatically;
* All the information about the pictures should be saved to MySQL DB;
* The pictures should be stored in a file system.
* There should be an admin CRUD for the pictures and their descriptions;
* Admin interface should be protected by password. Admin user can be only one and no CRUD for new admin users required

### [Description of the test tasks](http://tasks.php.itrexgroup.com/php/middle.html) #2 [solution](app/Http/Controllers/HomeController.php)

An integer X and a non-empty zero-indexed array A consisting of N integers are given. We are interested in which elements of A are equal to X and which are different from X. The goal is to split array A into two parts, such that the number of elements equal to X in the first part is the same as the number of elements different from X in the other part.
More formally, we are looking for an index K such that:

* 0 ≤ K < N, and
* the number of elements equal to X in A[0..K−1] is the same as the number of elements different from X in A[K..N−1]. (For K = 0, A[0..K−1] does not contain any elements.)

For example, given integer X = 6 and array A such that:

A[0] = 6
A[1] = 6
A[2] = 1
A[3] = 8
A[4] = 2
A[5] = 3
A[6] = 6

K equals 4, because:

* two of the elements of A[0..3] are equal to X, namely A[0] = A[1] = X, and
* two of the elements of A[4..6] are different from X, namely A[4] and A[5].

#### Write a function:
**function solution($X, $A);**

that, given an integer X and a non-empty zero-indexed array A consisting of N integers, returns the value of index K satisfying the above conditions. If more than one index K satisfies the above conditions, your function may return any of them. If there is no such index, the function should return −1. For example, given integer X and array A as above, the function should return 4, as explained above. Assume that:

* N is an integer within the range [1..100,000];
* X is an integer within the range [0..100,000];
* each element of array A is an integer within the range [0..100,000].

Complexity (not required):

* expected worst-case time complexity is O(N);
* expected worst-case space complexity is O(1), beyond input storage (not counting the storage required for input arguments).

Elements of input arrays can be modified.

#### [routes](app/Http/routes.php)
#### [migrations](database/migrations/)
#### [seeds](database/seeds/DatabaseSeeder.php)

**Stack**

* [Docker](https://docs.docker.com/engine/)
* [Nginx](https://www.nginx.com/resources/admin-guide/)
* [MySQL](http://dev.mysql.com/doc/)
* [Laravel 5](http://laravel.com/docs)
* [Bootstrap](http://www.w3schools.com/bootstrap/)
* [jQuery](http://api.jquery.com/)