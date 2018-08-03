#include <iostream.h>

enum { KisSmol, KisLarge, KisSame };

class Data
{
      public:
             Data(int val): myValue(val){}
             ~Data(){}
             int Compare(const Data &);
             void Show() { cout << myValue << endl; }
      private:
              int myValue;
};

int Data::Compare(const Data & theOtherData)
{
    if(myValue < theOtherData.myValue)
      return KisSmol;
    if(myValue > theOtherData.myValue)
      return KisLarge;
    else
      return KisSame;
}

class Node;
class HeadNode;
class TailNode;
class InternalNode;

class Node
{
      public:
             Node(){}
             virtual ~Node(){}
             virtual Node * Insert(Data * theData)=0;
             virtual void Show()=0;
      private:
};

class InternalNode : public Node
{
      public:
             InternalNode(Data * theData, Node * next);
             ~InternalNode(){ delete myNext; delete myData; }
             virtual Node * Insert(Data * theData);
             virtual void Show(){ myData->Show(); myNext->Show();}
      private:
              Data * myData;
              Node * myNext;
};

InternalNode::InternalNode(Data * theData, Node * next):
myData(theData), myNext(next)
{
}

Node * InternalNode::Insert(Data * theData)
{
     int result = myData->Compare(*theData);
     
     switch(result)
     {
        case KisSame:
        case KisLarge:
             {
                InternalNode *dataNode = new InternalNode(theData, this);
                return dataNode;
             }
       case KisSmol:
                myNext = myNext->Insert(theData);
                return this;
            }
       return this;
}

class TailNode : public Node
{
      public:
             TailNode(){}
             ~TailNode(){}
             virtual Node *Insert(Data *theData);
             virtual void Show(){ }
      private:
};
Node *TailNode::Insert(Data *theData)
{
            InternalNode *dataNode = new InternalNode(theData, this);
            return dataNode;
}
class HeadNode : public Node
{
      public:
             HeadNode();
             ~HeadNode(){ delete myNext; }
             virtual Node *Insert(Data *theData);
             virtual void Show() { myNext->Show(); }
      private:
              Node *myNext;
};

HeadNode::HeadNode()
{
      myNext = new TailNode;
}
Node *HeadNode::Insert(Data *theData)
{
     myNext = myNext->Insert(theData);
     return this;
}

class LinkedList
{
      public:
             LinkedList();
             ~LinkedList(){ delete myHead; }
             void Insert(Data *theData);
             void ShowALL(){ myHead->Show(); }
      private:
              HeadNode *myHead;
};

LinkedList::LinkedList()
{
    myHead = new HeadNode;
}
void LinkedList::Insert(Data *pData)
{
     myHead->Insert(pData);
}


int main()
{
    Data *pData;
    int val;
    LinkedList LL;
    
    for(;;)
    {
    cout << "Enter a Namber ( 0 to STOP!): ";
    cin >> val;
     if(!val)
      break;
     pData = new Data(val);
     LL.Insert(pData);
     }
     LL.ShowALL();
     
     system("pause");
     return 0;
}
     
    
             
                                 
