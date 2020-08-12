<?php
namespace Algs;

/**
 * p.163
 *
 * 希尔排序: 交换不相邻的元素进行局部排序, 最终用插入排序将局部有序的数组排序
 *
 * 它之所以更高效, 是因为它权衡了子数组的规模和有序性, 而这两种情况都很适合插入排序
 * - 规模: 排序之初, 各个子数组都很短
 * - 有序性: 排序之后子数组都是部分有序的
 * 故不同于选择和插入排序, 希尔排序也可以用于大型数组. 它的代码量很小, 且不需要使用额外的空间.
 * 其他更高效的算法, 除了对于很大的 N, 它们可能只会比希尔排序快两倍 (可能还达不到), 而且更复杂
 * 如果你需要解决一个排序问题而又没有系统排序函数可用, 可以先用希尔排序, 然后再考虑是否值得将它替换为
 * 更加复杂的排序算法. 在实际应用中, 因为**递增序列**的生成函数之间的区别并不明显, 故选择这里使用的递增序列基本就足够了
 *
 * 理解希尔排序的性能至今是一项挑战, 目前最重要的结论是, 它的运行时间达不到平方级别.
 *
 * 性质
 *   使用递增序列 1, 4, 13, 40, 121... 的希尔排序所需的比较次数不会超出 N 的若干倍乘以递增序列的长度
 */
class ShellSort extends Sort
{
    public static function sort(array &$a): void
    {
        $N = count($a);
        $h = 1;
        while ($h < $N / 3) {
            $h = 3 * $h + 1; // 1, 4, 13, 40, 121, 364, 1093, ...
        }
        while ($h >= 1) { // 将数组变为 h 有序
            for ($i = $h; $i < $N; $i++) {
                for ($j = $i; $j >= $h && self::less($a[$j], $a[$j-$h]); $j -= $h) {
                    self::exch($a, $j, $j-$h);
                }
            }
            $h = (int) ($h / 3); // 注意强转成 int
        }
    }
}