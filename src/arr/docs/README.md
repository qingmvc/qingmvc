
#array_merge — 合并一个或多个数组

array array_merge ( array $array1 [, array $... ] )
array_merge() 将一个或多个数组的单元合并起来，一个数组中的值附加在前一个数组的后面。返回作为结果的数组。

如果输入的数组中有相同的字符串键名，则该键名后面的值将覆盖前一个值。
然而，如果数组包含数字键名，后面的值将不会覆盖原来的值，而是附加到后面。
如果只给了一个数组并且该数组是数字索引的，则键名会以连续方式重新索引。


#array_merge_recursive — 递归地合并一个或多个数组

array array_merge_recursive ( array $array1 [, array $... ] )
array_merge_recursive() 将一个或多个数组的单元合并起来，一个数组中的值附加在前一个数组的后面。返回作为结果的数组。
如果输入的数组中有相同的字符串键名，则这些值会被合并到一个数组中去，这将递归下去，
因此如果一个值本身是一个数组，本函数将按照相应的条目把它合并为另一个数组。
然而，如果数组具有相同的数组键名，后一个值将不会覆盖原来的值，而是附加到后面。


#array_replace_recursive — 使用传递的数组递归替换第一个数组的元素

array array_replace_recursive ( array $array1 , array $array2 [, array $... ] )
array_replace_recursive() 使用后面数组元素的值替换数组 array1 的值。 
*如果一个键存在于第一个数组同时也存在于第二个数组，它的值将被第二个数组中的值替换。*
如果一个键存在于第二个数组，但是不存在于第一个数组，则会在第一个数组中创建这个元素。 
如果一个键仅存在于第一个数组，它将保持不变。 
如果传递了多个替换数组，它们将被按顺序依次处理，后面的数组将覆盖之前的值。

array_replace_recursive() 是递归的：它将遍历数组并将相同的处理应用到数组的内部值。

如果数组 array1 中的值是标量，它的值将被第二个数组 array2 中的值替换，它可能是一个标量或者数组。
如果 array1 和 array2 中的值都是数组，array_replace_recursive() 函数将递归地替换它们各自的值。

