#include <iostream.h>

class SimpleCircle
{
      public:
             SimpleCircle();
             SimpleCircle(int);
             SimpleCircle(const SimpleCircle &);
             ~SimpleCircle(){}
             
             void SetRadius(int);
             int GetRadius()const;
             
             const SimpleCircle & operator++();
             const SimpleCircle operator++(int);
             SimpleCircle& operator=(const SimpleCircle &);
      private:
              *int itsRadius;
};

SimpleCircle::SimpleCircle()
{itsRadius = new int(5);}

SimpleCircle::SimpleCircle(int radius)
{itsRadius = new int(radius);}

SimpleCircle::SimpleCircle(const SimpleCircle & rhs)
{
int val = rhs.GetRadius();
itsRadius = new int(val);
}
SimpleCircle::~SimpleCircle()
{
delete itsRadius;
}

SimpleCircle& SimpleCircle::operator=(const SimpleCircle & rhs)
{
            if(this==&rhs)
                return *this;
            *itsRadius = rhs.GetRadius();
            return *this;
}

const SimpleCircle& SimpleCircle::operator++()
{
      ++(*itsRadius);
      return *this;
}
const SimpleCircle SimpleCircle::operator++(int)
{
//*this
SimpleCircle temp(*this);
++(*itsRadius);
return temp;
}
int SimpleCircle::GetRadius()const
{
    return *itsRadius;
}

int main()
{
    SimpleCircle CircleOne, CircleTwo(9);
    CircleOne++;
    ++CircleTwo;
    cout << "Radius: " << CircleOne.GetRadius() << endl;
    cout << "Radius: " << CircleTwo.GetRadius() << endl;
    CircleOne = CircleTwo;
    cout << "Radius: " << CircleOne.GetRadius() << endl;
    cout << "Radius: " << CircleTwo.GetRadius() << endl;
    system("pause")
    return 0;
}
