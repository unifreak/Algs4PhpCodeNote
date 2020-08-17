# Code
```php
/**
 * p.1, t.2
 *
 * 成本模型
 *   两个空格
 */
```

it's computer science, so lgN means log base 2

没有将代码根据章节组织, 应该以 README 中的 @see 为导向

ClassMap?

# TODO
- 表格?
- Math Expression: <https://github.com/leegao/readme2tex>
- _underscore_ not working in README.md
- fill @todo
- search @?
- wiki pages

# 基础

算法能在任何计算机上用任何语言实现
数据结构是算法的副产品或是结果
不应该使用资源消耗情况未知的算法

## 基础编程模型

编写递归代码注意:
- 递归总有一个**最简单的情况**
- 递归调用总是去尝试解决一个**规模更小**的子问题, 这样才能**收敛**最简单的情况
- 递归调用的父问题和尝试解决的子问题之间不应该有**交集**

while 循环中, 递增变量再循环结束之后仍然是可用的. 这个区别常常是使用 while 而非 for (不可用) 的主要原因

## 数据抽象

定义和使用数据类型, 这个过程也被称为**数据抽象**, 它是**函数抽象**风格的补充. 抽象数据类型 (ADT) 的主要不同之处在于将数据和函数的实现关联起来, 并将数据的表示方式隐藏起来

所有对象都有三大重要特性: 状态, 标识和行为

静态方法的主要作用是实现函数, 非静态(实例)方法的主要作用是实现数据类型的操作

## 背包, 队列和栈

理解链表是学习各种算法和数据结构中最关键的一步. 在结构化存储数据集时, 链表是数组的一种重要的替代方式. 不过链表编程也会遇到各种问题, 且调试十分困难

**链表**表示的是一列元素, 不同之处在于, 在链表中向序列插入或删除元素都更便捷:
- 从表头插入和删除结点都和链表长度无关
- 在其他位置的插入和删除操作和链表长度成正比. 标准解决方案是使用**双向链表**

链表的使用达到了我们的**对栈的**最优设计目标
- 可处理任意类型数据
- 所需空间和集合大小成正比
- 操作所需时间和集合大小无关

**背包**:一种不支持从中删除元素的集合数据类型, 迭代的顺序不确定且与用例无关.

**先进先出队列(队列)**:FIFO, 入列顺序和出列顺序相同

**下压栈(栈)**:LIFO, 入列顺序和出列顺序相反. 在计算机领域, 栈具有基础而深远的影响

使用栈进行算术表达式计算, 如 (1 + ( ( 2 + 3 ) * ( 4 * 5 ) )`:
1. 将操作数压栈
2. 将运算符压栈
3. 忽略左括号
4. 遇到右括号时, 弹出一个运算符, 弹出所需数量的操作数, 并将运算符和操作数的运算结果压入操作数栈 见 Evaluate.php

数组和链表这两种表示对象集合的方式, 常常被称为**顺序存储**和**链式存储**, 我们会在后面通过以下方式扩展这两种基本数据结构:
- 扩展为含有多个链接的数据结构
- 扩展为复合型的数据结构, 如用背包存储栈, 用队列存储数组等

在研究一个新的应用领域时, 我们按以下步骤识别并使用数据抽象解决问题:
1. 定义 API
2. 根据特定应用场景开发用例代码
3. 描述一种数据结构(一组值的表示), 并在 API 所对应的抽象数据类型的实现中根据它定义类的实例变量
4. 描述算法(实现一组操作的方式), 并根据它实现类中的实例方法
5. 分析算法的性能特点

## 算法分析

性能问题:
- 程序会运行多长时间
- 会耗用多少内存

回答这些问题的过程的基础是_科学方法_.
我们会使用_数学分析_为算法成本建立简洁的模型, 并使用_实验数据_验证这些模型.

科学方法的一般过程
1. 细致_观察_真实世界, 精确测量
2. 根据观察结果提出_假设_模型
3. 根据模型_预测_未来的事件
4. 继续观察并_核实_预测的准确性
5. 如此反复直到确认预测和观察一致

科学方法的关键原则
- 设计的试验必须是_可重现_的, 这样他人也可自己验证假设
- 假设也必须是_可证伪_的, 这样我们才能确认某个假设是错误的

计算性任务的困难程度可以用_问题的规模_来衡量, 问题的规模可以是输入的大小或某个命令行参数. 如果运行时间和输入规模本身相对无关, 我们就需要进行一些试验来更好地理解并更好的控制运行时间对输入的敏感度. 你常常能在程序运行的时候就给出一个较为准确的预测 @see ThreeSum. 准确测量给定程序的运行时间是困难的, 但我们一般只需要近似值就可以了. 我们仍然需要准确的衡量来生成实验数据, 并根据它们得出并验证关于程序运行时间和问题规模的假设 @see Stopwatch

假设: 幂次法则
使用 Stopwatch 测量 ThreeSum 的性能, 得到的图像符合**幂次法则**, 即 T(N)=aN^b 的猜想.
许多自然和人工的现象都符合幂次法则

Knuth 认为, 原则上我们可能构造出一个**数学模型**来描述任意程序的运行时间, 一个程序运行的总时间主要和两点有关:
- 执行每条语句的耗时
- 执行每条语句的频率

对于频率的分析, 一般会产生一个多项式, 一般次多项式中, 首项之后的其他项都相对较小, 我们常用 ~ 来忽略较小的项. 我们用 ~f(N) 表示所有随着 N 的增大除以 f(N) 的结果趋近于 1 的函数 (即随着 N 增大, ~f(N) 越来越近似于 f(N)). 用 g(N)~f(N) 表示 g(N)/f(N) 随着 N 的增大趋近于 1. 一般我们用到的近似方程都是 g(N)~af(N), 其中 f(N)=N^b(logN)^c, 其中 a, b, c 都是常数, 我们称 f(N) 为 g(N) 的**增长数量级**

对于程序运行时间的_猜想_很重要, 因为它将抽象世界的一个程序 和真实世界中运行它的一台计算机_联系_了起来; _增长数量级_则让我们更进一步: 将程序和它实现的算法_隔离_开来, 这使我们对算法性能的知识可以应用于任何计算机

我们观察到一个关键现象是执行最频繁的指令决定了程序执行的总时间, 我们将这些指令成为程序的**内循环**

我们用**性质**表示需要用实验验证的_猜想_.
我们用**成本模型**评估算法的性质, 这个模型定义了算法中的基本操作, 如访问数组的次数.
我们用**命题**表示在某个成本模型下算法的_数学性质_
我们会研究算法准确的数学性质(命题)并对实现的性能做出猜想(性质), 并通过实验验证这些猜想

得到程序运行时间的数学模型所需的一般步骤如下:
1. 确定_输入模型_, 定义_问题规模_
2. 识别_内循环_
3. 根据内循环中的操作确定_成本模型_
4. 对于给定的输入, 判断这些操作的执行频率. 这可能需要进行_数学分析_

理解特定的数学模型对于理解基础算法的运行效率是很关键的

常见增长数量级的分类

|描述|数量级|典型代码|举例|备注|
|------|------|------|------|------|
|常数|1|普通语句|两数相加|
|对数|logN|二分策略|二分查找|对数的底数和增长的数量级无关, 因为不同底数仅相当于一个常数因子|
|线性|N|循环|找出最大元素|
|线性对数|NlogN|分治|归并排序|在实践中非常重要|
|平方|N^2|双层循环|检查所有元素对|
|立方|N^3|三层循环|检查所有三元组|
|指数|2^N|穷举|检查所有子集|非常慢, 不可能用于解决大规模问题, 但在算法理论仍有重要地位|

了解增长数量级的一个重要动力是帮助我们设计更快的算法, 比如如何优化 ThreeSum ?
- 先考虑问题的简化版本 @see TwoSum
- 使用已知的较快算法, 如归并排序(线性对数)和二分查找(对数) @see TwoSumFast

我们通常按以下方式解决各种新问题:
1. 实现并分析该问题的一种简单解法, 通常称其为**暴力**算法
2. 考察算法的各种改进, 它们通常能降低算法运行时间的增长数量级
3. 用实验证明新的算法更快
我们会学习同一个问题的多种算法, 因为对于实际问题来说, _运行时间只是选择算法所要考虑的因素之一_

倍率定理
: 如果 T(N)~aN^blgN, 那么 T(2N)/T(N)~2^b

通过**倍率试验**可以简单有效的预测大部分(对比值没有极限的算法无效)程序性能, 并判断其增长数量级:
1. 开发一个输入生成器来产生实际情况下的各种可能输入 (如 DoublingTest::timeTrail())
2. 运行 @see DoublingRatio, 计算每次试验和上次的运行时间比值
3. 反复运行直到该比值趋近于极限 2^b (倍率定理)
4. 则增长数量级约为 N^b (比如 T(N)~8=N^b, b=3)
5. 要预测一个程序的运行时间, 将上次观察到的时间乘以 2^b 并将 N 加倍, 如此反复
在性能压力的情况下应该考虑对编写过的所有程序进行倍率试验. 如果希望预测的输入规模不是 N 乘以 2,
则可以相应的调整这个比例

性能分析时产生误导性结果的原因, 有可能是
- 大常数: 我们忽略的常数可能很大, 要对大常数保持敏感
- 非决定性的内循环: 成本模型可能需要改进
- 指令时间: 每条指令执行时间总是相同的, 这个假设并不总是正确
- 系统因素: 系统中同时运行的其他程序应该是可以忽略或可以控制的
- 不分伯仲
- 对输入的强烈依赖: 注意输入应该和运行时间相对无关
    + 更小心的为问题的输入建模, 现有输入模型可能是不切实际的
    + 保证最坏情况下的性能, 如心脏起搏器
    + 随机化算法: 如 @see 快速排序中打乱输入, 以及 @see 散列算法
    + 考虑操作序列, 如压出栈的操作序列不同, 栈的性能可能也大不相同
    + 均摊分析: 将少量昂贵操作的成本通过大量廉价操作摊平 @? p.125
- 多个问题参量

算法分析者的任务就是尽可能地解释关于某个算法的更多信息, 而程序员的任务则是利用这些信息开发有效解决现实问题的程序

## 案例研究: union-find 算法

**动态连通性问题** @see UF
问题输入是一列整数对, 一对整数 p 和 q 代表 "p 和 q 相连". 目标是过滤掉序列中无意义的整数对 (两个整数均来自于同一个等价类中). 我们将对象称为 **触点**, 整数对称为 **连接**, 等价类称为 **连通分量** 或简称 **分量**

这个问题有很多现实应用, 如:
- 网络: 节点之间是否有连接? 电路触电是否相连? 社交网络中两个人是否有关系?
- 变量名等价性
- 数学集合: p 和 q 是否属于不同的数学集合?

设计算法时面对的第一个任务就是精确地定义问题

数据结构的性质将直接影响到算法的效率, 因此数据结构和算法的设计是紧密相关的

本书中研究各种基础问题时都会遵循的基本步骤:
1. 完整而详细的定义问题, 找出解决问题所必须的基本抽象操作并定义一份 API
2. 简介的实现一种初级算法, 给出一个精心组织的开发用例并使用实际数据作为输入
3. 当实现所能解决的问题的最大规模达不到期望时, 决定改进还是放弃
4. 逐步改进实现, 通过经验性分析或(和)数学分析验证改进后的效果
5. 用更高层次的抽象表示数据结构或算法来设计更高级的改进版本
6. 如果可能尽量为最坏情况下的性能提供保证, 但在处理普通数据时也要有良好的性能
7. 在适当的时候将更细致的深入研究留给有经验的研究者并继续解决下一个问题


# 排序

学习排序算法三大意义:
1. 对排序算法的分析有助于全面理解比较算法性能的方法
2. 类似的技术也能有效解决其他类型的问题
3. 排序算法常常是解决其他问题的第一步

## 初级排序算法 @see Sort

学习这些初级算法的必要性:
- 它们帮助我们建立了一些基本的规则
- 它们展示了一些性能基准
- 在某些特殊情况下它们也是很好的选择
- 它们是开发更强大的排序算法的基石

选择排序 @see SelectionSort
插入排序 @see InsertionSort
希尔排序 @see ShellSort

只有研究那些最重要的算法的专家才会经历完整的研究过程, 但每个使用算法的程序员都应该了解算法的性能特性背后的科学过程.
我们通过以下步骤比较两个算法:
1. 实现并调试它们
2. 分析它们的基本性质
3. 对它们的相对性能做出猜想
4. 用实验验证我们的猜想 @see SortCompare

## 归并排序

@see
- MergeSort
- TopDownMergeSort
- BottomUpMergeSort

不要对算法初始实现的性能盖棺定论

**分治思想**: 将大问题分割成小问题分别解决, 然后用所有小问题的答案来解决大问题

命题: 没有任何基于比较的算法能够保证使用少于 lg(N!)~NlgN (斯特灵公式) 次比较将长度为 N 的数组排序
证明: 任意基于比较的排序算法都对应着一颗高 h 的比较树, 而这个树叶子结点数量满足以下关系:
    N! <= 叶子结点数量 <= 2^h
    之所以至少有 N! 个, 是因为 N 个不同主键会有 N! 中不同排列, 如果少于 N!, 则肯定有遗漏
    之所以至多有 2^h 个, 是因为二叉树的性质
这是一个重要结论, 适用于任何能想到的基于比较的算法. 准确的上界为软件工程师保证性能提供了空间, 而准确的下界可以避免浪费时间在不可能的性能改进上

## 快速排序

@see
Sort
- SelectionSort
- InsertionSort
- MergeSort
    + TopDownMergeSort
    + BottomUpMergeSort
- ShellSort
- QuickSort
    + ThreeWayQuickSort

## 优先队列

**优先队列** 是一种_抽象数据类型_, 应该支持两种操作: _删除最大元素_ 和 _插入元素_

应用场景:
- 模拟系统: 事件的键即为发生的事件, 系统需要按时间顺序处理所有事件
- 任务调度: 键值对应的优先级决定了应该首先执行哪些任务
- 数值计算: 键值代表计算错误, 需要按照键值指定的顺序修正它们
- 排序: 通过插入一列元素然后一个个的删除其中最小的元素, 实现排序算法 @see 堆排序

实现栈或是队列与实现优先队列的最大不同在于对性能的要求

初级实现: _插入_和_删除最大元素_在最坏情况下需要_线性_时间
- 可以选择使用_基于数组的下压栈_或者_基于链表的下压栈_
- 可以选择使用_惰性方法_或者_积极方法_
    + 惰性方法: 插入时和入栈操作一样. 删除时用类似选择排序的内循环交换最大元素和边界元素, 然后删除
    + 积极方法: 插入时就利用插入排序, 使栈保持有序. 删除时则和出栈操作一样

基于堆的实现: 对数级别
- PQ
    + MaxPQ
    + MinPQ -> TopM
    + IndexMinPQ -> Multiway

**堆排序**: HeapSort


