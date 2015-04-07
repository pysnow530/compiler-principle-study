#!/usr/bin/env python
'''
File: Tree.py
Author: pysnow530@163.com
Description: tree algorithm
'''

class Node:

    def __init__(self, content):
        self.content = content
        self.childs = []

    def addChild(self, childNode):
        self.childs.append(childNode)
        return self

    def addChilds(self, childNodes):
        self.childs += childNodes
        return self

    def getChilds(self):
        return self.childs

    def setContent(self, content):
        self.content = content

    def getContent(self):
        return self.content

    def __str__(self):
        return 'node("' + self.content + '")'

root = Node('root content').addChilds([
    Node('child1').addChilds([
        Node('cchild1'),
        Node('cchild2'),
    ]),
    Node('child2'),
])

def trace(root):
    print 'root>>> ' + root.getContent() + '...'
    childs = root.getChilds()
    for child in childs:
        trace(child)

trace(root)
