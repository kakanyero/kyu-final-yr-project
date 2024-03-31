# e-SHOP
# e-SHOP
Statements and declarations
JavaScript applications consist of statements with an appropriate syntax. A single statement may span multiple lines. Multiple statements may occur on a single line if each statement is separated by a semicolon. This isn't a keyword, but a group of keywords.

Statements and declarations by category
For an alphabetical listing see the sidebar on the left.

Control flow
return
Specifies the value to be returned by a function.

break
Terminates the current loop, switch, or label statement and transfers program control to the statement following the terminated statement.

continue
Terminates execution of the statements in the current iteration of the current or labeled loop, and continues execution of the loop with the next iteration.

throw
Throws a user-defined exception.

if...else
Executes a statement if a specified condition is true. If the condition is false, another statement can be executed.

switch
Evaluates an expression, matching the expression's value to a case clause, and executes statements associated with that case.

try...catch
Marks a block of statements to try, and specifies a response, should an exception be thrown.

Declaring variables
var
Declares a variable, optionally initializing it to a value.

let
Declares a block scope local variable, optionally initializing it to a value.

const
Declares a read-only named constant.

Functions and classes
function
Declares a function with the specified parameters.

function*
Generator Functions enable writing iterators more easily.

async function
Declares an async function with the specified parameters.

async function*
Asynchronous Generator Functions enable writing async iterators more easily.

class
Declares a class.

Iterations
do...while
Creates a loop that executes a specified statement until the test condition evaluates to false. The condition is evaluated after executing the statement, resulting in the specified statement executing at least once.

for
Creates a loop that consists of three optional expressions, enclosed in parentheses and separated by semicolons, followed by a statement executed in the loop.

for...in
Iterates over the enumerable properties of an object, in arbitrary order. For each distinct property, statements can be executed.

for...of
Iterates over iterable objects (including arrays, array-like objects, iterators and generators), invoking a custom iteration hook with statements to be executed for the value of each distinct property.

for await...of
Iterates over async iterable objects, array-like objects, iterators and generators, invoking a custom iteration hook with statements to be executed for the value of each distinct property.

while
Creates a loop that executes a specified statement as long as the test condition evaluates to true. The condition is evaluated before executing the statement.

Others
Empty
An empty statement is used to provide no statement, although the JavaScript syntax would expect one.

Block
A block statement is used to group zero or more statements. The block is delimited by a pair of curly braces.

Expression statement
An expression statement evaluates an expression and discards its result. It allows the expression to perform side effects, such as executing a function or updating a variable.

debugger
Invokes any available debugging functionality. If no debugging functionality is available, this statement has no effect.

export
Used to export functions to make them available for imports in external modules, and other scripts.

import
Used to import functions exported from an external module, another script.

label
Provides a statement with an identifier that you can refer to using a break or continue statement.

with Deprecated
Extends the scope chain for a statement.

Difference between statements and declarations
In this section, we will be mixing two kinds of constructs: statements and declarations. They are two disjoint sets of grammars. The following are declarations:

let
const
function
function*
async function
async function*
class
export (Note: it can only appear at the top-level of a module)
import (Note: it can only appear at the top-level of a module)
Everything else in the list above is a statement.

The terms "statement" and "declaration" have a precise meaning in the formal syntax of JavaScript that affects where they may be placed in code. For example, in most control-flow structures, the body only accepts statements — such as the two arms of an if...else:

JS
Copy to Clipboard
if (condition)
  statement1;
else
  statement2;
If you use a declaration instead of a statement, it would be a SyntaxError. For example, a let declaration is not a statement, so you can't use it in its bare form as the body of an if statement.

JS
Copy to Clipboard
if (condition)
  let i = 0; // SyntaxError: Lexical declaration cannot appear in a single-statement context
On the other hand, var is a statement, so you can use it on its own as the if body.

JS
Copy to Clipboard
if (condition)
  var i = 0;
You can see declarations as "binding identifiers to values", and statements as "carrying out actions". The fact that var is a statement instead of a declaration is a special case, because it doesn't follow normal lexical scoping rules and may create side effects — in the form of creating global variables, mutating existing var-defined variables, and defining variables that are visible outside of its block (because var-defined variables aren't block-scoped).

As another example, labels can only be attached to statements.

JS
Copy to Clipboard
label: const a = 1; // SyntaxError: Lexical declaration cannot appear in a single-statement context
Note: there's a legacy grammar that allows function declarations to have labels, but it's only standardized for compatibility with web reality.

To get around this, you can wrap the declaration in braces — this makes it part of a block statement.

JS
Copy to Clipboard
label: {
  const a = 1;
}

if (condition) {
  let i = 0;
}
Browser compatibility
Report problems with this compatibility data on GitHub
desktop	mobile	server
Chrome
Edge
Firefox
Opera
Safari
Chrome Android
Firefox for Android
Opera Android
Safari on iOS
Samsung Internet
WebView Android
Deno
Node.js
async function statement

