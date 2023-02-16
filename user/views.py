from django.shortcuts import render, redirect
from django.contrib.auth import authenticate, login, logout
from django.contrib.auth.models import User, Group
from django.contrib import messages


def logout_user(request):
    logout(request)
    messages.success(request, 'You have been logged out.')
    
    return redirect('home')

def login_user(request):
    if request.method == 'POST':
        username = request.POST.get('username')
        password = request.POST.get('password')
        user = authenticate(request, username=username, password=password)
        if user is not None:
            login(request, user)
            messages.success(request, f'Welcome {username}!')
            return redirect('home')
        else:
            messages.error(request, 'Invalid username or password.')
            return redirect('login')
    else:

        return render(request, 'authenticate/login.html', {})

def register_user(request):
    if request.method == 'POST':
        firstname = request.POST.get('firstname')
        lastname = request.POST.get('lastname')
        username = request.POST.get('username')
        email = request.POST.get('email')
        password = request.POST.get('password')
        password2 = request.POST.get('password2')
        group = request.POST.get('group')

        new_user = User.objects.create_user(username, email, password)
        
        new_user.first_name = firstname
        new_user.last_name = lastname
        new_user.save()

        user_group = Group.objects.get(name=group) 
        user_group.user_set.add(new_user)
        
        messages.success(request, f'Success! Log in to continue')
        return redirect('login')
       
    else:
        return render(request, 'authenticate/register.html', {})
