import { h } from 'preact';
import { route } from 'preact-router';
import { LoginSocialGoogle } from 'reactjs-social-login';
import { GoogleLoginButton } from 'react-social-login-buttons';
import { loginUser } from './utils';

const login = async ({ _provider, data }) => {
  result = await loginUser(data);
  const { is_registered, role } = result;
  is_registered ? (window.location = `/dashboard/${role}`) : route('/login/type');
};

export const Login = () => {
  return (
    <div class="">
      <h2>Login</h2>
      <div class="tw-mb-[24px]">Please sign in using google to join our site. Registration is automatic for first time users. You will be asked to select your account type, "Student" or "Teacher". </div>
      <div className="tw-w-[264px]">
        <LoginSocialGoogle
          client_id="629364262662-m3e506o76ffiufs0tsfdqd5smcu8i9r3.apps.googleusercontent.com"
          redirect_uri="https://localhost/"
          scope="openid profile email"
          discoveryDocs="claims_supported"
          access_type="offline"
          onResolve={login}
          onReject={err => { console.log(err); }}
        >
          <GoogleLoginButton />
        </LoginSocialGoogle>
      </div>
    </div>
  )
}