<?php

namespace Gighub\ApplicationBundle\Security;

use HWI\Bundle\OAuthBundle\Security\Core\User\EntityUserProvider;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

class AutoCreateEntityUserProvider extends EntityUserProvider
{
    public function loadUserByOAuthUserResponse(UserResponseInterface $response)
    {
        try {
            return parent::loadUserByOAuthUserResponse($response);
        } catch (UsernameNotFoundException $e) {
            $user = $this->repository->findOneBy(array('email' => $response->getEmail()));

            if (!$user) {
                throw $e;
            }

            $user->setUsername($response->getUsername());
            $this->em->flush();

            return $user;
        }
    }
}
