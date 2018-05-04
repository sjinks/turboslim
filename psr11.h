#ifndef TURBOSLIM_PSR11_H
#define TURBOSLIM_PSR11_H

#include "php_turboslim.h"

TURBOSLIM_VISIBILITY_HIDDEN int maybe_init_psr11();

extern zend_class_entry* ce_Psr_Container_ContainerInterface;
extern zend_class_entry* ce_Psr_Container_ContainerExceptionInterface;
extern zend_class_entry* ce_Psr_Container_NotFoundExceptionInterface;

#endif /* TURBOSLIM_PSR11_H */
