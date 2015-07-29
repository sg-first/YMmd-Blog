<?php
# Markdown文本转HTML
# Copyright (c) 2004-2015 Michel Fortin 

namespace Michelf;

# Markdown解释器接口（两个解释器均继承于本接口）
interface MarkdownInterface {
  # 初始化解析器，并返回其变换方法的结果
  public static function defaultTransform($text);
  # 对输入文本进行一些预处理
  public function transform($text);
}
