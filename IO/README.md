## IO
File handling is a common requirement in web development and in this topic we will familiarize ourselves with the common file manipulation features in PHP. For example, we have already seen in laravel how configurations are stored in a .env file.

You may well be familiar with databases such as MySQL and Access which are an ever-increasingly common means of storing data. But data is also stored in files, like Word documents, event logs, spreadsheets, image files, and so on. Databases generally require a special query language to retrieve information, whereas files are ‘flat’ and usually appear as a stream of text.

Most often when working with files you’ll read from or write to them. When you want to read the contents of a file you first have to open it, then read as much of the contents as you want, then close the file when you’re finished. When writing to a file, it also needs to be opened (or perhaps created if it doesn’t already exist), then you write your data to it, and close the file when you have finished. In PHP5 there are some built-in wrapper functions that handle the opening and closing automatically for you, but it still happens under the hood.

You may also find it useful to find out more about the file by examining its attributes before you start working with it. For example, does the file exist? When was it last updated? When was it created?

PHP provides a range of functions which allow you to work with files, and in this article I’ll demonstrate some of them for you.

File Attributes
---------------

File attributes are the properties of a file, for example its size, the last time it was accessed, its owner, etc. Let’s look at how you find out more about the files you’re working with.

### File Size

The function `filesize()` retrieves the size of the file in bytes.

    <?php
    $f = "C:\Windows\win.ini";
    $size = filesize($f);
    echo $f . " is " . $size . " bytes.";

When executed, the example code displays:

C:Windowswin.ini is 510 bytes.

The use of a file on a Windows system here highlights an important point; because the backslash has special meaning as an escape character in strings, you’ll need to escape it by adding another backslash.

If the file doesn’t exist, the `filesize()` function will return false and emit an `E_WARNING`, so it’s better to check first whether the file exists using the function `file_exists()`:

    <?php
    $f = "C:\Windows\win.ini";
    if (file_exists($f))  {
        $size = filesize($f);
        echo $f . " is " . $size . " bytes.";
    }
    else  {
        echo $f . " does not exist.";
    }

In fact many of the functions presented in this section have the same behavior, i.e., emit warnings. I’ve not included a check with `file_exists()` in the rest of my examples for the sake of brevity, but you’ll want to use it when you write your own code.

### File History

To determine when a file was last accessed, modified, or changed, you can use the following functions respectively: `fileatime()`, `filemtime()`, and `filectime()`.

    <?php
    $dateFormat = "D d M Y g:i A";

    $atime = fileatime($f);
    $mtime = filemtime($f);
    $ctime = filectime($f);

    echo $f . " was accessed on " . date($dateFormat, $atime) . ".<br>";
    echo $f . " was modified on " . date($dateFormat, $mtime) . ".<br>";
    echo $f . " was changed on " . date($dateFormat, $ctime) . ".";

The code here retrieves the timestamp of the last access, modify, and change dates and displays them,

C:Windowswin.ini was accessed on Tue 14 Jul 2009 4:34 AM.
C:Windowswin.ini was modified on Fri 08 Jul 2011 2:03 PM.
C:Windowswin.ini was changed on Tue 14 Jul 2009 4:34 AM.

To clarify, `filemtime()` returns the time when the contents of the file was last modified, and `filectime()` returns the time when information associated with the file, such as access permissions or file ownership, was changed.

The `date()` function was used to format the Unix timestamp returned by the `file*time()` functions. Refer to the [documentation for the `date()` function](http://php.net/manual/en/function.date.php) for more formatting options.

### File Permissions

Before working with a file you may want to check whether it is readable or writeable to the process. For this you’ll use the functions `is_readable()` and `is_writeable()`:

    <?php
    echo $f . (is_readable($f) ? " is" : " is not") . " readable.<br>";
    echo $f . (is_writable($f) ? " is" : " is not") . " writeable.";

Both functions return a Boolean value whether the operation can be performed on the file. Using the ternary operator you can tailor the display to state whether the file is or is not accessible as appropriate.

C:Windowswin.ini is readable.
C:Windowswin.ini is not writeable.

### File or Not?

To make absolutely sure that you’re dealing with a file you can use the `is_file()` function. `is_dir()` is the counterpart to check if it is a directory.

    <?php
    echo $f . (is_file($f) ? " is" : " is not") . " a file.<br>";
    echo $f . (is_dir($f) ? " is" : " is not") . " a directory.";

The example code outputs:

C:Windowswin.ini is a file.
C:Windowswin.ini is not a directory.

Reading Files
-------------

The previous section showed how you can find out a good deal about the files you’re working with before you start reading or writing to them. Now let’s look at how you can read the contents of a file.

The convenience function `file_get_contents()` will read the entire contents of a file into a variable without the need to open or close the file yourself. This is handy when the file is relatively small, as you wouldn’t want to read in 1GB of data into memory all at once!

    <?php
    $f = "c:\windows\win.ini";
    $f1 = file_get_contents($f);
    echo $f1;

For larger files, or just depending on the needs of your script, it’s may be wiser to handle the details yourself. This is because once a file is opened you can seek to a specific offset within it and read as little or as much data as you want at a time.

The function `fopen()` is used to open the file:

    <?php
    $f = "c:\windows\win.ini";
    $f1 = fopen($f, "r");

Using the function `fopen()`, two arguments are needed – the file I want to open and the mode, which in this case is “r” for read. The function returns a handle or stream to the file, stored in the variable `$f1`, which you use in all subsequent commands when working with the file.

The most common mode values are:

![table of basic file modes](https://dab1nmslvvntp.cloudfront.net/wp-content/uploads/2012/04/files_tench01.jpg "files_tench01")

For other values, refer to the list in [PHP’s `fopen()` page](http://php.net/manual/en/function.fopen.php).

To read from the opened file one line at a time, use the function `fgets()`:

    <?php
    $f = "c:\windows\win.ini";
    $f1 = fopen($f, "r");
    do {
        echo fgets($f1) . "<br>";
    }
    while (!feof($f1));
    fclose($f1);

Using a `do`–`while` loop is a good option because you may not know in advance how many lines are in the file. The function `feof()` checks whether the file has reached its end – the loop continues until the end of file condition is reached.

To tidy up after I’ve finished reading the file, the function `fclose()` is used to close the file.

Writing Files
-------------

Two commonly used modes when writing to a file using the function `fwrite()` are “w” and “a” – “w” indicates you want to write to the file but it will remove any of the existing file contents beforehand, while “a” means that you will append any new data to what already exists in the file. You need to be sure you are using the correct option!

In this example I’ll use “a” to append:

    <?php
    $file = "add_emp.txt";
    $f1 = fopen($file, "a");
    $output = "banana" . PHP_EOL;
    fwrite($f1, $output);
    $output = "cheese" . PHP_EOL;
    fwrite($f1, $output);
    fclose($f1);

First the file name is assigned to a variable, then the file is opened in mode “a” for append. The data to be written is assigned to a variable, `$output`, and `fwrite()` adds the data to the file. The process is repeated to add another line, then the file is closed using `fclose()`. The pre-defined constant `PHP_EOL` adds the newline character specific to the platform PHP is running on.

The file contents after executing the above code should look like this:

banana
cheese

The convenience function `file_put_contents()` can also write to a file. It accepts the file name, the data to be written to the file, and the constant `FILE_APPEND` if it should append the data (it will overwrite the file’s contents by default).

Here’s the same example as above, but this time using `file_put_contents()`:

    <?php
    $file = "add_emp.txt";
    file_put_contents($file, "banana" . PHP_EOL);
    file_put_contents($file, "cheese" . PHP_EOL, FILE_APPEND);

Working with CSV Files
----------------------

CSV stands for comma separated variable and indicates the file contains data delimited with a comma. Each line is a record, and each record is made up of fields, very much like a spreadsheet. In fact, software such as Excel provides the means to save files in this format. Here is an example as displayed in Excel 2007 (which doesn’t show the commas):

![Excel showing a CSV file](https://dab1nmslvvntp.cloudfront.net/wp-content/uploads/2012/04/files_tench02.jpg "files_tench02")

There are 4 lines of data, or records, in the file containing first name, last name, age and job title. To read the file and extract the individual fields, start by opening the file in read mode:

    <?php
    $file = "employees.csv";
    $f = fopen($file, "r");

Now I need to use a function specifically to read the CSV formatted file, `fgetcsv()`; a while loop is used to cater for the fact that the number of records is expected to vary:

    <?php
    $file = "employees.csv";
    $f = fopen($file, "r");
    while ($record = fgetcsv($f)) {
        foreach($record as $field) {
            echo $field . "<br>";
        }
    }
    fclose($f);

This will produce output with a field on each line:

Fred
Smith
45
Engineer
Susan 
Brown
33
Programmer
Ed
Williams
24
Trainee
Jo
Edwards
29
Analyst

Let’s examine the loop. First, `fgetcsv()` has one argument only – the file handle; the comma delimiter is assumed. `fgetcsv()` returns data in an array which is then processed using a `foreach` loop. When all records have been read the file is closed using `fclose()`.

Let’s now look at how you can update or write to a CSV file, this time using the function `fputcsv()`. Because I am using the same file that I used above, I will open it in append mode, and the data to be added to the file has been defined in an array.

    <?php
    $file = "employees.csv";
    $f = fopen($file, "a");

    $newFields = array(
        array('Tom', 'Jones', 36, 'Accountant'),
        array('Freda', 'Williams', 45, 'Analyst'),
        array('Brenda', 'Collins', 34, 'Engineer'));

    foreach($newFields as $fields)  {
    	fputcsv($f, $fields);
    }
    fclose($f);

The contents of the file as displayed in Excel now look like this:

![Excel showing a CSV file](https://dab1nmslvvntp.cloudfront.net/wp-content/uploads/2012/04/files_tench03a.jpg "files_tench03a")

Mini project(feature-white)
---------------------------

> Your friend likes playing pranks on you!
> This time round he/she hides your house keys and encodes the message in bunch of files which you have to rename to get where your keys are.

> Consider the zip file prank.zip which has the encoded message.
> Using PHP (OOP) decode the secret messsage by removing the letters from the filename and saving the renamed files in a folder named prank_cracked

#### Credit
- [Iain Tench](https://www.sitepoint.com/author/itench/)

#### References
- [Working With Files In PHP](https://www.sitepoint.com/working-with-files-in-php/)
- [Learning PHP A Gentle Introduction to the Web’s Most Popular Language, David Sklar  (2016).](https://www.amazon.com/Learning-PHP-Introduction-Popular-Language/dp/1491933577)
- [Basic PHP File Handling — Create, Open, Read, Write, Append, Close, and Delete](https://davidwalsh.name/basic-php-file-handling-create-open-read-write-append-close-delete)
- [Udacity Programming foundations with Python](https://www.udacity.com/course/programming-foundations-with-python--ud036)

>_'He is no fool who gives up what he cannot keep to gain what he cannot lose.'_  Jim Elliot ✍ ✍
