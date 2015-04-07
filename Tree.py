#!/usr/bin/env python
'''
File: Tree.py
Author: pysnow530@163.com
Description: tree algorithm
'''

class Node:

    def __init__(self):
        self.content = None
        self.childs = []

    def addChild(self, childNode):
        return self.childs.append(childNode)

    def getChilds(self, childNodes):
        return self.childs

    def setContent(self, content):
        self.content = content

    def getContent(self, content):
        return self.content

    def __str__(self):
        return 'node("' + self.content + '")'

class Tree:

    def __init__(self, rootNode):
        self.root = rootNode

root = Node()
root.setContent('root node')
print root
